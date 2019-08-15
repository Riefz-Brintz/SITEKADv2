<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Branches;
use App\Jeniskelamin;
use App\Statusperkawinan;
use App\TadRekening;
use App\TadKeluarga;
use App\TadSim;
use App\TadPendidikan;
use App\TadRiwayatKerja;
use App\Tadkk;
use App\TadAsuransiKesehatan;
use App\TadAsuransiKerja;
use App\TadAlamat;
use App\TadSeragam;
use App\Kota;
use App\Bank;
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
        $Tad=DB::select('select * from tbl_tad_data_pribadi where is_deleted= 0  and no_ektp="1671010708780003" order by idtad desc limit 50');
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
        $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
        $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
        $Statusperkawinan = Statusperkawinan::orderBy('id','Asc')->get();
        $TadAskes = DB::select('select * from vTadaskes where no_ektp_askes = "'.$item->no_ektp.'"');
        $Tadasker = DB::select('select * from vtadasker where no_ektp = "'.$item->no_ektp.'" ');
        $TadRekening = TadRekening::where('no_ektp',$item->no_ektp)->get();
        $TadKeluarga = TadKeluarga::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadPendidikan = TadPendidikan::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadRiwayatKerja = TadRiwayatKerja::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $Tadkk = Tadkk::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadAlamat = TadAlamat::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadSeragam = TadSeragam::where('no_ektp',$item->no_ektp)->where('is_deleted',0)->get();
        $TadSim = TadSim::where('no_ektp',$item->no_ektp)->get();
        $ProgramAsuransi = ProgramAsuransi::orderBy('idprogasuransi','Asc')->get();
        $ProviderAsuransi = ProviderAsuransi::orderBy('idprovasuransi','Asc')->get();
        $Kota = Kota::orderBy('kd_dati2','Asc')->get();
        $Provinsi = Provinsi::orderBy('kd_prov','Asc')->get();
        $Faskes = Faskes::orderBy('kd_faskes','Asc')->get();
        $Branches = Branches::orderBy('IDBranches','Asc')->get();
        $Bank = Bank::orderBy('IDBank','Asc')->get();

        // dd($Lembagakeu);
        return view('masterTad.Tadubah',compact('item','Branches','Jeniskelamin','Statusperkawinan','TadRekening','TadKeluarga','TadSim','TadPendidikan','TadRiwayatKerja','Tadkk','TadAskes','Tadasker','ProviderAsuransi','ProgramAsuransi','TadAlamat','Kota','TadSeragam','Provinsi','Faskes','Bank'));
         
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
        dd($request);
        $idtad = Tad::where('IDTad',$id)->update([
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
        dd($idtad->no_ektp);

        $rowalamat =  count($request->alamattad);

        // Insert Alamat
        Tadalamat::where('no_ektp',request('no_ektp'))->update([
            'is_deleted'=>1,
            
        ]);

        for ($i=0; $i < $rowalamat; $i++) {

            if (request('idalamattad')[$i]!=null || request('idalamattad')[$i] != ''  ) {
                TadAlamat::where('idalamattad',request('idalamattad')[$i])->update([
                    'no_ektp'=>request('no_ektp'),
                    'idtad'=>$idtad->no_ektp,
                    'status_alamat' => request('status_alamat')[$i],
                    'alamattad' => request('alamattad')[$i],
                    'rt_tad' => request('rw_tad')[$i],
                    'rw_tad' => request('rt_tad')[$i],
                    'desakelurahantad' => request('desakelurahantad')[$i],
                    'kecamatantad' => request('kecamatantad')[$i],
                    'kd_dati2tad' => request('kd_dati2')[$i],
                    'dati2tad' => request('dati2tad')[$i],
                    'kd_provtad' => request('kd_prov')[$i],
                    'provinsitad' => request('provinsitad')[$i],
                    'no_hpphone' => request('no_hpphone')[$i],
                    'kodepos' => request('kodepos')[$i],
                    'is_deleted'=>0,                                                                                                                                                                                                                       
                ]);
            } else{
                
                // dd(request('status_alamat')[$i]);
                TadAlamat::create([
                    'no_ektp'=>request('no_ektp'),
                    'idtad'=>$idtad->no_ektp,

                    'nik_tad' => request('nik_tad'),
                    'status_alamat' => request('status_alamat')[$i],
                    'alamattad' => request('alamattad')[$i],
                    'rt_tad' => request('rw_tad')[$i],
                    'rw_tad' => request('rt_tad')[$i],
                    'kd_dekeltad' => request(''),
                    'desakelurahantad' => request('desakelurahantad')[$i],
                    'kd_kecamatantad' => request(''),
                    'kecamatantad' => request('kecamatantad')[$i],
                    'kd_dati2tad' => request('kd_dati2')[$i],
                    'dati2tad' => request('dati2tad')[$i],
                    'kd_provtad' => request('kd_prov')[$i],
                    'provinsitad' => request('provinsitad')[$i],
                    'no_hpphone' => request('no_hpphone')[$i],
                    'kodepos' => request('kodepos')[$i],
                    'is_deleted'=>0,                
                ]);
            }
        }

        $rowkk =  count($request->nama_kk);

        Tadkk::where('no_ektp',request('no_ektp'))->update([
            'is_deleted'=>1,
            
        ]);
        
        // Insert KK
        for ($i=0; $i < $rowkk; $i++) {
            if (request('idkktad')[$i]!=null || request('idkktad')[$i] != ''  ) {
                // dd(request('tgl_lahirkk')[$i]);
                Tadkk::where('idkktad',request('idkktad')[$i])->update([
                    'idtad'=>$idtad->no_ektp,
                    'no_ektp'=>request('no_ektp'),
                    "nik_tad" => request('nik_tad'),
                    "nik_kk" => request('nik_kk')[$i],
                    "no_ektpkk" => request('no_ektpkk')[$i],
                    "nama_kk" => request('nama_kk')[$i],
                    "hub_keluarga" => request('hub_keluarga')[$i],
                    "tmp_lahir_kk" => request('tmp_lahirkk')[$i],
                    "tgl_lahir_kk" => request('tgl_lahirkk')[$i],
                    "jenkel_kk" => request('jenkel_kk')[$i],
                    "goldarah_kk" => request('goldarah_kk')[$i],
                    "telp_hpkk" => request('telp_hpkk')[$i],
                    "is_deleted" => 0,

                ]);
            } else {
                Tadkk::create([
                    'idtad'=>$idtad->no_ektp,
                    'no_ektp'=>request('no_ektp'),
                    "nik_tad" => request('nik_tad'),
                    "nik_kk" => request('nik_kk')[$i],
                    "no_ektpkk" => request('no_ektpkk')[$i],
                    "nama_kk" => request('nama_kk')[$i],
                    "hub_keluarga" => request('hub_keluarga')[$i],
                    "tmp_lahir_kk" => request('tmp_lahirkk')[$i],
                    "tgl_lahir_kk" => request('tgl_lahirkk')[$i],
                    "jenkel_kk" => request('jenkel_kk')[$i],
                    "goldarah_kk" => request('goldarah_kk')[$i],
                    "telp_hpkk" => request('telp_hpkk')[$i],
                    "is_deleted" => 0,
                ]);
            }
        }





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

    public function getProviderAsuransi($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();

        $ProviderAsuransi = ProviderAsuransi::orderBy('idprovasuransi','Asc')->get();

        echo json_encode([
            "prov" => $ProviderAsuransi,
            "status" => 200
        ]);
    }

    public function getProgramAsuransi($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();
        $ProgramAsuransi = ProgramAsuransi::orderBy('idprogasuransi','Asc')->get();

        echo json_encode([
            "programasuransi" => $ProgramAsuransi,
            "status" => 200
        ]);
    }

    public function getBank($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();
        $Bank = Bank::orderBy('idbank','Asc')->get();

        echo json_encode([
            "bank" => $Bank,
            "status" => 200
        ]);
    }
}
