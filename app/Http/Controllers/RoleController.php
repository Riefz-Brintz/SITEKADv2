<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Model\RoleDetail;
use App\Model\User;
use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DataTables;
use Response;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    // dd(Auth::user());

    }

    public function cekakses()
    {
        $akses=DB::select('SELECT * from vakses
            WHERE id = '.Auth::id().' and Nama_Menu="Role" limit 1');



        if (!$akses){
            return abort(404);
        }else{
            Session::put('tambah', $akses[0]->tambah);
            return $akses;
        }

    }

    public function index(){   
        $aksesdata = $this->cekakses();

        return view('masterrole.role');
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    }

    public function tampil_data_role(){
        return Datatables::of(Role::where('is_deleted',0))
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
                    $btn = $btn. '<a class="dropdown-item" href="'.url('/Role/'.$row->idrole.'/edit').'"><i class="fas fa-edit mr-2"></i>Ubah</a>';
                    }  
                    if ($akses[0]->hapus=='Ya'){
                    $btn = $btn.  '<a class="dropdown-item" onclick="hapusRole('.$row->idrole.')"><i class="fas fa-trash mr-2"></i>Hapus</a>';
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
        $Menu = Menu::orderBy('idmenu','Asc')->get();
        return view("masterRole.Roletambah", compact("Menu"));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_role' => 'required|unique:tbl_role'
        ]);

        $dataRole = [
            'nama_role'=>request('nama_role'),
            'keterangan'=>request('keterangan'),
            'is_deleted'=>'0'
        ];

        $idrole = Role::create($dataRole);

        // $idtad = Tad::where('IDTad',$id)->update($dataPribadiTad);
        $rowroledetail =  count($request->idmenu);
        // Insert role detail
        RoleDetail::where('idrole',$idrole->idrole)->update(['is_deleted'=>1]);

        if($idrole){
            $dataroledetail = array();
            for ($i=0; $i < $rowroledetail; $i++) {

                $dataroledetail = [    
                    'idrole'=>$idrole->idrole,
                    'idmenu' => request('idmenu')[$i],
                    'lihat' => request('lihat')[$i],
                    'tambah' => request('tambah')[$i],
                    'ubah' => request('ubah')[$i],
                    'hapus' => request('hapus')[$i],
                    'is_deleted'=>0
                ]; 

                RoleDetail::create($dataroledetail);

            }
        }

        return redirect('/Role')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $Role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $item=DB::table('tbl_role')->where ('idrole',$id)->first();

       // $item = Role::where('idrole',$id)->get();
        $RoleDetail = RoleDetail::where('idrole',$id)->where('is_deleted',0)->get();

        $Menu = Menu::orderBy('idmenu','Asc')->get();
       // dd($item);
        return view('masterRole.Roleubah',compact('item','Menu','RoleDetail'));
         // echo $Role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataRole = [
            'nama_role'=>request('nama_role'),
            'keterangan'=>request('keterangan'),
            'is_deleted'=>'0'
        ];

        Role::where('idrole',$id)->update($dataRole);

        $rowroledetail =  count($request->idmenu);
        // Insert role detail
        RoleDetail::where('idrole',$id)->update(['is_deleted'=>1]);


            // $dataroledetail = array();
        for ($i=0; $i < $rowroledetail; $i++) {

            $dataroledetail = [    
                'idrole'=>$id,
                'idmenu' => request('idmenu')[$i],
                'lihat' => request('lihat')[$i],
                'tambah' => request('tambah')[$i],
                'ubah' => request('ubah')[$i],
                'hapus' => request('hapus')[$i],
                'is_deleted'=>0
            ]; 

            if (request('idroledetail')[$i]!=null || request('idroledetail')[$i] != ''  ) {
                RoleDetail::where('idroledetail',request('idroledetail')[$i])->update($dataroledetail);
            } else{                                                                                        
                RoleDetail::create($dataroledetail);
            }

        }
        


        return redirect('/Role')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // dd('asdfasfd');
        Role::where('idrole',$id)->update([
            'is_deleted'=>1,
        ]);

        RoleDetail::where('idrole',$id)->update([
            'is_deleted'=>1,
        ]);

        // Tad::where('IDTad',$id)->delete();

        return redirect('/Role')->with('status','Data Role Telah Dihapus');
    }


    public function export(request $request) {

        $Role=DB::select('select * from vlistRole');

        if (request('print') == "PRINT") {
            return view('masterRole.Roleprint', compact('Role'));
        } else if (request('excel') == "to EXCEL") {
            return view('masterRole.Roleexcel', compact('Role'));
        } else if (request('pdf') == "to PDF") {
            $pdf = PDF::loadView('masterRole.Rolepdf', compact('Role'));
            return $pdf->download('Master Data Role.pdf');
        }
    }

    public function getMenu($id){
        $menu = Menu::orderBy('idmenu','Asc')->get();

        echo json_encode([
            "menu" => $menu,
            "status" => 200
        ]);
    }


}
