<?php

namespace App\Http\Controllers;

use App\Model\Jenisbq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use DataTables;
use Response;
use DB;

class JenisbqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cekakses(){
        $akses=DB::select('SELECT * from vakses
            WHERE id = '.Auth::id().' and Nama_Menu="Jenisbq"');

        if (!$akses){
            return abort(404);
        }else{
            Session::put('tambah', $akses[0]->tambah);
            return $akses;
        }

    }

    public function index(){   

        $this->cekakses();
        $Jenisbq = Jenisbq::orderBy('idjenisbq','Desc')->where('is_deleted',0)->get();

        return view('masterjenisbq.Jenisbq');

    }

    public function tampil_data_Jenisbq(){
        return Datatables::of(Jenisbq::orderBy('idjenisbq','Desc')->where('is_deleted',0)->get())
        ->addIndexColumn()

        ->addColumn('action', function($row){
          
        $akses = $this->cekakses();

          if ($akses[0]->ubah=='Tidak' && $akses[0]->hapus=='Tidak'  ){
          $btn = '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                      Tindakan
                    </button>                    
                  
                  </div>
                </div>';
          }else {
          $btn = '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                      Tindakan
                    </button>                    
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">';
                    if ($akses[0]->ubah=='Ya'){
                    $btn = $btn. '<a class="dropdown-item" onclick="ubahdata('.$row->idjenisbq.')" href="#" data-toggle="modal" data-target="#modal_jenisbq"><i class="fas fa-edit mr-2"></i>Ubah</a>';
                    }  
                    if ($akses[0]->hapus=='Ya'){
                    $btn = $btn.  '<a class="dropdown-item" onclick="hapusJenisbq('.$row->idjenisbq.')"><i class="fas fa-trash mr-2"></i>Hapus</a>';
                    }  
                  $btn = $btn.'</div>
                  </div>
                </div>';

          }


          return $btn;
      })
      //   ->rawColumns(['action'])
        ->make(true);
    }


  public function create(){
    return view("masterJenisbq.Jenisbqtambah");
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(request $data)
    {
        $data->validate([
            'jenisbq' => 'required|unique:tbl_jenisbq',

        ]);

        $dataJenisbq = [
            'jenisbq'=>request('jenisbq'),
            'created_by'=>Auth::id(),
            'is_deleted'=>0,
        ];
       // dd($dataJenisbq);

        Jenisbq::create($dataJenisbq);

        return redirect('/Jenisbq')->with('status','berhasil menambah data');
    }

    public function show(Jenisbq $Jenisbq)
    {
        //
    }


    // public function edit($id)
    // {   
  
    //     $dataJenisbq = Jenisbq::where('idjenisbq',$id)->where('is_deleted',0)->with('getrole','getcabang')->first();

    //     return view('masterJenisbq.Jenisbqubah',compact('dataJenisbq'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Jenisbq  $Jenisbq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);

        $dataJenisbq = [
            'jenisbq'=>request('jenisbq'),
            'updated_by'=>Auth::id(),
        ];
        Jenisbq::where('idjenisbq',$id)->update($dataJenisbq);

        return redirect('/Jenisbq')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Jenisbq  $Jenisbq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenisbq::where('idjenisbq',$id)->update([
            'is_deleted'=>1,
        ]);

        return redirect('/Jenisbq')->with('status','Data Jenisbq Telah Dihapus');
    }



    public function edit($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();

        $jenisbq = Jenisbq::where('idjenisbq',$id)->get();

        echo json_encode([
            "jenisbq" => $jenisbq,
            "status" => 200
        ]);
    }
}
