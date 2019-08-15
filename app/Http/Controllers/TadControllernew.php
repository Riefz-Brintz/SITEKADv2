<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Branches;
use App\Jeniskelamin;
use App\Statusperkawinan;
use App\Lembagakeuangan;
use App\Keluargatad;
use App\Simtad;
use App\Pendidikantad;
use App\Riwayatkerjatad;
use App\Tadkk;
use App\TadAsuransiKesehatan;
use App\TadAsuransiKerja;
use App\TadAlamat;
use App\TadSeragam;
use App\Kota;
use App\Provinsi;
use App\Faskes;
use App\ProgramAsuransi;
use App\ProviderAsuransi;
use App\Tad;

class TadController extends Controller
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
    $akses=DB::select('SELECT
    `users`.`id`
    , `tblmenu`.`Nama_Menu`
    FROM
    `dtu_laravel`.`tblroledetail`
    INNER JOIN `dtu_laravel`.`tblrole` 
        ON (`tblroledetail`.`IDRole` = `tblrole`.`IDRole`)
    INNER JOIN `dtu_laravel`.`users` 
        ON (`users`.`IDRole` = `tblrole`.`IDRole`)
    INNER JOIN `dtu_laravel`.`tblmenu` 
        ON (`tblmenu`.`IDMenu` = `tblroledetail`.`IDMenu`)
        WHERE id = '.Auth::id().' and Nama_Menu="Tad"' );

    if (!$akses){
        return abort(404);

        }

    }


    public function index()
    {
        // $this->cekakses();
        $Tad=DB::select('select * from tbl_tad_data_pribadi where no_ektp=9104010209800002 and is_deleted= 0 order by idtad desc limit 50');
        return view('mastertad.tad',compact('Tad'));
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

          }



    public function create()
    {
        
         $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
         $Statusperkawinan = Statusperkawinan::orderBy('id','Asc')->get();
         $Branches = Branches::orderBy('idbranches','Asc')->get();
        return view("masterTad.Tadtambah", compact("Branches","Jeniskelamin","Statusperkawinan"));
    }
     


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'no_ektp' => 'required|unique:tbl_tad_data_pribadi',
            'nik_tad' => 'required|unique:tbl_tad_data_pribadi'
        ]);


        Tad::create([
            'no_ektp'=>request('no_ektp'),
            'nik_tad'=>request('nik_tad'),
            'branch_id'=>request('branch_id'),
            'nm_lengkaptad'=>request('nm_lengkaptad'),
            'tmp_lahir'=>request('tmp_lahir'),
            'tgl_lahir'=>request('tgl_lahir'),
            'umur'=>request('umur'),
            'jenis_kel'=>request('jenis_kel'),
            'agama'=>request('agama'),
            'statusperkawinan'=>request('statusperkawinan'),
            'warga_negara'=>request('warga_negara'),
            'gol_darah'=>request('gol_darah'),
            'nm_ibukandung'=>request('nm_ibukandung'),
            'catatan'=>request('catatan'),
            'emailadd'=>request('emailadd'),
            'npwptad'=>request('npwptad'),
            
            
        ]);

        return redirect('/Tad')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function show(Tad $Tad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=DB::table('tbl_tad_data_pribadi')->where ('IDTad',$id)->first();
        $TadAsuransiKesehatan = DB::select('select * from vTadAsuransiKesehatanList where no_ektp = "'.$item->no_ektp.'"');
        $TadAsuransiKerja = DB::select('select * from vTadAsuransiKerjaList where no_ektp = "'.$item->no_ektp.'" ');
        $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
        $ProgramAsuransi = ProgramAsuransi::orderBy('idprogasuransi','Asc')->get();
        $ProviderAsuransi = ProviderAsuransi::orderBy('idprovasuransi','Asc')->get();
        $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
        $Statusperkawinan = Statusperkawinan::orderBy('id','Asc')->get();
        $Lembagakeu = Lembagakeuangan::where('no_ektp',$item->no_ektp)->get();
        $Keluargatad = Keluargatad::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $Pendidikantad = Pendidikantad::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $Riwayatkerjatad = Riwayatkerjatad::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $Tadkk = Tadkk::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadAlamat = TadAlamat::where('no_ektp',$item->no_ektp)->get();
        $TadSeragam = TadSeragam::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $Simtad = Simtad::where('no_ektp',$item->no_ektp)->get();
        $Kota = Kota::orderBy('kd_dati2','Asc')->get();
        $Provinsi = Provinsi::orderBy('kd_prov','Asc')->get();
        $Faskes = Faskes::orderBy('kd_faskes','Asc')->get();
        $Branches = Branches::orderBy('IDBranches','Asc')->get();

        // dd($Lembagakeu);
         
         return view('masterTad.Tadubahv2',compact('item','Branches','Jeniskelamin','Statusperkawinan','Lembagakeu','Keluargatad','Simtad','Pendidikantad','Riwayatkerjatad','Tadkk','TadAsuransiKesehatan','TadAsuransiKerja','ProviderAsuransi','ProgramAsuransi','TadAlamat','Kota','TadSeragam','Provinsi','Faskes'));
         // echo $Tad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Tad::where('IDTad',$id)->update([
        //     'no_ektp'=>request('no_ektp'),
        //     'nik_tad'=>request('nik_tad'),
        //     'branch_id'=>request('branch_id'),
        //     'nm_lengkaptad'=>request('nm_lengkaptad'),
        //     'tmp_lahir'=>request('tmp_lahir'),
        //     'tgl_lahir'=>request('tgl_lahir'),
        //     'umur'=>request('umur'),
        //     'jenis_kel'=>request('jenis_kel'),
        //     'agama'=>request('agama'),
        //     'statusperkawinan'=>request('statusperkawinan'),
        //     'warga_negara'=>request('warga_negara'),
        //     'gol_darah'=>request('gol_darah'),
        //     'nm_ibukandung'=>request('nm_ibukandung'),
        //     'catatan'=>request('catatan'),
        //     'emailadd'=>request('emailadd'),
        //     'npwptad'=>request('npwptad'),
            
        // ]);




        $datatad = [
            'no_ektp'=>$request->no_ektp,
            'nik_tad'=>$request->nik_tad,
            'branch_id'=>$request->branch_id,
            'nm_lengkaptad'=>$request->nm_lengkaptad,
            'tmp_lahir'=>$request->tmp_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'umur'=>$request->umur,
            'jenis_kel'=>$request->jenis_kel,
            'agama'=>$request->agama,
            'statusperkawinan'=>$request->statusperkawinan,
            'warga_negara'=>$request->warga_negara,
            'gol_darah'=>$request->gol_darah,
            'nm_ibukandung'=>$request->nm_ibukandung,
            'catatan'=>$request->catatan,
            'emailadd'=>$request->emailadd,
            'npwptad'=>$request->npwptad,
        ];
        
        $iddatatad = Tad::where('IDTad',$id)->update($datatad);

        if($iddatatad){
            // $dataalamat = array();
            $idalamattad = $request->idalamattad;
            for($i = 0 ; $i < sizeof($idalamattad); $i++){
                $dataalamat[] = array(
                    'no_ektp'=>$request->no_ektp,
                    'idalamattad'=>$request->idalamattad[$i],
                    'status_alamat' => $request->status_alamat[$i],
                    'alamattad' => $request->alamattad[$i],
                    'rt_tad' => $request->rw_tad[$i],
                    'rw_tad' => $request->rt_tad[$i],
                    'desakelurahantad' => $request->desakelurahantad[$i],
                    'kecamatantad' => $request->kecamatantad[$i],
                    'kd_dati2tad' => $request->kd_dati2[$i],
                    'dati2tad' => $request->dati2tad[$i],
                    'kd_provtad' => $request->kd_prov[$i],
                    'provinsitad' => $request->provinsitad[$i],
                    'no_hpphone' => $request->no_hpphone[$i],
                    'kodepos' => $request->kodepos[$i],
                    'is_deleted'=>'0', 
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                );
                    // echo($dataalamat[]);
                    if ($dataalamat['idalamattad'[$i]] !=null || $dataalamat['idalamattad'[$i]] != ''  ) {
                        dd($dataalamat);
                        $dataalamat = TadAlamat::update($dataalamat[$i])->where('idalamattad',$dataalamat->idalamattad[$i]);
                    }else{
                        $dataalamat = TadAlamat::create($dataalamat[$i]);

                    }
                
            }
        }
            // print_r($dataTerimaBarangDetail);
        

        // $rowalamat =  count($request->alamattad);

        // // Insert Alamat
        // Tadalamat::where('no_ektp',request('no_ektp'))->update([
        //     'is_deleted'=>1,
            
        // ]);





        return redirect('/Tad')->with('status','Data TAD Berhasil Di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
         Tad::where('IDTad',$id)->update([
            'is_deleted'=>1,
            
        ]);
         
        // Tad::where('IDTad',$id)->delete();
         return redirect('/Tad')->with('status','Data TAD Telah Di Hapus');
    }


    public function export(request $request) {

        $Tad=DB::select('select * from tbl_tad_data_pribadi');

        if (request('print') == "PRINT") {
            return view('mastertad.Tadprint', compact('Tad'));
        } else if (request('excel') == "to EXCEL") {
            return view('mastertad.Tadexcel', compact('Tad'));
        } else if (request('pdf') == "to PDF") {
            $pdf = PDF::loadView('mastertad.Tadpdf', compact('Tad'));
            return $pdf->download('Master Data Tad.pdf');
        }
    }

    public function getKota($id){


        if ($id ==null || $id == '' || $id=='0') {
            $kota = Kota::orderBy('kd_dati2','Asc')->get();
        }else {
            $kota = Kota::where('kd_prov', $id)->get();
        }

        echo json_encode([
            "kota" => $kota,
            "status" => 200
        ]);
    }


    public function getProvinsi($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();
        $Provinsi = Provinsi::orderBy('kd_prov','Asc')->get();

        echo json_encode([
            "provinsi" => $Provinsi,
            "status" => 200
        ]);
    }

    public function getFaskes($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();
        $Faskes = Faskes::orderBy('kd_faskes','Asc')->get();

        echo json_encode([
            "faskes" => $Faskes,
            "status" => 200
        ]);
    }
}
