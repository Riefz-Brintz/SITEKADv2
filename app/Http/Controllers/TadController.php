<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Session;
use DataTables;
use Response;
use DB;
use App\Model\Cabang;
use App\Model\Jeniskelamin;
use App\Model\Statusperkawinan;
use App\Model\TadRekening;
use App\Model\TadKeluarga;
use App\Model\TadSim;
use App\Model\TadPendidikan;
use App\Model\TadRiwayatKerja;
use App\Model\Tadkk;
use App\Model\TadAsuransiKesehatan;
use App\Model\TadAsuransiKerja;
use App\Model\TadAlamat;
use App\Model\TadSeragam;
use App\Model\Kota;
use App\Model\Bank;
use App\Model\Provinsi;
use App\Model\Faskes;
use App\Model\ProgramAsuransi;
use App\Model\ProviderAsuransi;
use App\Model\Tad;

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
        $akses=DB::select('SELECT * from vakses
            WHERE id = '.Auth::id().' and Nama_Menu="Tad" limit 1');

        if (!$akses){
            return abort(404);
        }else{
            Session::put('tambah', $akses[0]->tambah);
            return $akses;
        }

    }
      

public function index()
{   
    // $aksesdata = $this->cekakses();

    return view('mastertad.tad');
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  }

 public function tampil_data_tad(){
        return Datatables::of(DB::table('vtadlist')->where ('is_deleted',0))
            // DB::select('SELECT * from vtadlist
            // WHERE is_deleted=0 limit 1'))
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
                    $btn = $btn. '<a class="dropdown-item" href="'.url('/Tad/'.$row->IDTad.'/edit').'"><i class="fas fa-edit mr-2"></i>Ubah</a>';
                    }  
                    if ($akses[0]->hapus=='Ya'){
                    $btn = $btn.  '<a class="dropdown-item" onclick="hapustad('.$row->IDTad.')"><i class="fas fa-trash mr-2"></i>Hapus</a>';
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


  public function create()
  {
     $Jeniskelamin = Jeniskelamin::orderBy('id','Asc')->get();
     $Statusperkawinan = Statusperkawinan::orderBy('id','Asc')->get();
     $Cabang = Cabang::orderBy('idcabang','Asc')->get();
     return view("masterTad.Tadtambah", compact("Cabang","Jeniskelamin","Statusperkawinan"));
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

        $fileektp       = $request->file('gambar');
        $fileNameektp   = $request->no_ektp .'.jpg';
        $request->file('gambar')->move("img_ektp/", $fileNameektp);

        $filefotodiri       = $request->file('gambardiri');
        $fileNamefotodiri   = $request->nik_tad .'.jpg';
        $request->file('gambardiri')->move("img_fotodiri/", $fileNamefotodiri);

        Tad::create([
            'no_ektp'=>request('no_ektp'),
            'nik_tad'=>request('nik_tad'),
            'idcabang'=>request('idcabang'),
            'nm_lengkaptad'=>request('nm_lengkaptad'),
            'tmp_lahir'=>request('tmp_lahir'),
            'tgl_lahir'=>request('tgl_lahir'),
            'telp'=>request('telp'),
            'jenis_kel'=>request('jenis_kel'),
            'agama'=>request('agama'),
            'statusperkawinan'=>request('statusperkawinan'),
            'warga_negara'=>request('warga_negara'),
            'gol_darah'=>request('gol_darah'),
            'nm_ibukandung'=>request('nm_ibukandung'),
            'catatan'=>request('catatan'),
            'emailadd'=>request('emailadd'),
            'npwptad'=>request('npwptad'),
            'gambar_ektp'=>$fileNameektp,
            'foto_diri'=>$fileNamefotodiri,
            'is_deleted'=>0
            
        ]);

        return redirect('/Tad')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function show(Tad $Tad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // dd($id);
        $item=DB::table('tbl_tad_data_pribadi')->where ('IDTad',$id)->first();
        $TadAskes = TadAsuransiKesehatan::where('idtad',$id)->where('is_deleted',0)->with('getprovider','getprogram')->get();
        $TadAsker = TadAsuransiKerja::where('idtad',$id)->where('is_deleted',0)->with('getprovider','getprogram')->get();
        $TadRekening = TadRekening::where('idtad',$id)->get();
        $TadKeluarga = TadKeluarga::where('idtad',$id)->where('is_deleted',0)->get();
        $TadPendidikan = TadPendidikan::where('idtad',$id)->where('is_deleted',0)->get();
        $TadRiwayatKerja = TadRiwayatKerja::where('idtad',$id)->where('is_deleted',0)->get();
        $Tadkk = Tadkk::where('idtad',$id)->where('is_deleted',0)->get();
        $TadAlamat = TadAlamat::where('idtad',$id)->where('is_deleted',0)->with('getkota','getprovinsi')->get();
        $TadSeragam = TadSeragam::where('idtad',$id)->where('is_deleted',0)->get();
        $TadSim = TadSim::where('idtad',$id)->where('is_deleted',0)->get();
        
        $ProgramAsuransi = ProgramAsuransi::orderBy('idprogasuransi','Asc')->get();
        $ProviderAsuransi = ProviderAsuransi::orderBy('idprovasuransi','Asc')->get();
        $Kota = Kota::orderBy('idkota','Asc')->get();
        $Provinsi = Provinsi::orderBy('idprovinsi','Asc')->get();
        $Faskes = Faskes::orderBy('kd_faskes','Asc')->get();
        $Cabang = Cabang::orderBy('IDCabang','Asc')->get();
        $Bank = Bank::orderBy('IDBank','Asc')->get();

        // dd($TadAlamat);
        return view('masterTad.Tadubah',compact('item','Cabang','Jeniskelamin','Statusperkawinan','TadRekening','TadKeluarga','TadSim','TadPendidikan','TadRiwayatKerja','Tadkk','TadAskes','TadAsker','ProviderAsuransi','ProgramAsuransi','TadAlamat','Kota','TadSeragam','Provinsi','Faskes','Bank'));

         // echo $Tad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Tad  $Tad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $idtad = Tad::create($dataPribadiTad);

        // console.log($dataPribadiTad);
        // $asd = ['test' =>$idtad->IDTad];
        // dd($id);
        // dd($request->file('gambar'));
        if ($request->file('gambar')=="" || $request->file('gambar')==null) {
            $fileNameektp   = $request->no_ektp .'.jpg';
        } else {
            $fileektp       = $request->file('gambar');
            $fileNameektp   = $request->no_ektp .'.jpg';
            $request->file('gambar')->move("img_ektp/", $fileNameektp);
        }

        if ($request->file('gambardiri')=="" || $request->file('gambardiri')==null) {
            $fileNamefotodiri   = $request->nik_tad .'.jpg';
        } else {
            $filefotodiri       = $request->file('gambardiri');
            $fileNamefotodiri   = $request->nik_tad .'.jpg';
            $request->file('gambardiri')->move("img_fotodiri/", $fileNamefotodiri);
        }

        $dataPribadiTad = [
            'no_ektp'=>request('no_ektp'),
            'nik_tad'=>request('nik_tad'),
            'idcabang'=>request('idcabang'),
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
            'gambar_ektp'=>$fileNameektp,
            'foto_diri'=>$fileNamefotodiri,
            'is_deleted'=>0
        ];

        Tad::where('idtad',$id)->update($dataPribadiTad);

        // $idtad = Tad::where('IDTad',$id)->update($dataPribadiTad);
        $rowalamat =  count($request->idalamattad);
        // dd($request);
        // Insert Alamat
        Tadalamat::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowalamat; $i++) {

            $dataAlamat = [    
                'no_ektp'=>request('no_ektp'),
                'idtad'=>$id,
                'status_alamat' => request('status_alamat')[$i],
                'alamattad' => request('alamattad')[$i],
                'rt_tad' => request('rw_tad')[$i],
                'rw_tad' => request('rt_tad')[$i],
                'desakelurahantad' => request('desakelurahantad')[$i],
                'kecamatantad' => request('kecamatantad')[$i],
                'idkota' => request('idkota')[$i],
                'idprovinsi' => request('idprovinsi')[$i],
                'no_hpphone' => request('no_hpphone')[$i],
                'kodepos' => request('kodepos')[$i],
                'is_deleted'=>0
            ]; 

            if (request('idalamattad')[$i]!=null || request('idalamattad')[$i] != ''  ) {
                TadAlamat::where('idalamattad',request('idalamattad')[$i])->update($dataAlamat);
            } else{                                                                                        
                TadAlamat::create($dataAlamat);
            }
        }

        $rowkk =  count($request->idkktad);
        Tadkk::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);
        
        // Insert KK
        for ($i=0; $i < $rowkk; $i++) {
            $datakk = [
                'idtad'=>$id,
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
                "is_deleted" => 0
            ];

            if (request('idkktad')[$i]!=null || request('idkktad')[$i] != ''  ) {
                Tadkk::where('idkktad',request('idkktad')[$i])->update($datakk);
            } else {
                Tadkk::create($datakk);
            }
        }     

        // Insert Rekening
        $rowrekening =  count($request->idrekening);
        TadRekening::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowrekening; $i++) {
            $datarekening = [
                "idrekening"=>request('idrekening')[$i],
                "no_ektp"=>request('no_ektp'),
                "nik_tad"=>request('nik_tad'),
                "idtad"=>$id,
                "idbank"=>request('idbank')[$i],
                "kd_bank"=>request('kd_bank')[$i],
                "nm_bank"=>request('nm_bank')[$i],
                "jenis_bank"=>request('jenis_bank')[$i],
                "no_rekening"=>request('no_rekening')[$i],
                "is_deleted"=>0
            ];

            if (request('idrekening')[$i]!=null || request('idrekening')[$i] != ''  ) {
                TadRekening::where('idrekening',request('idrekening')[$i])->update($datarekening);
            } else {
                TadRekening::create($datarekening);
            }

        }

        // Insert Asuransi Kesehatan
        $rowasurkes =  count($request->idaskes);
        TadAsuransiKesehatan::where('no_ektp_askes',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowasurkes; $i++) {
            $dataasurkes = [
                "idaskes"=>request('idaskes')[$i],
                "idtad"=>$id,
                "no_ektp_askes"=>request('no_ektp'),
                "idprovasuransi"=>request('idprovasuransi')[$i],
                "idprogasuransi"=>request('idprogasuransi')[$i],
                "no_peserta_askes"=>request('no_peserta_askes')[$i],
                "no_daftar_askes"=>request('no_daftar_askes')[$i],
                "tgl_daftar_askes"=>request('tgl_daftar_askes')[$i],
                "faskes1"=>request('faskes1')[$i],
                "faskes2"=>request('faskes2')[$i],
                "is_deleted"=>0
            ];

            if (request('idaskes')[$i]!=null || request('idaskes')[$i] != ''  ) {
                TadAsuransiKesehatan::where('idaskes',request('idaskes')[$i])->update($dataasurkes);
            } else {
                // dd($request->idaskes);
                TadAsuransiKesehatan::create($dataasurkes);
            }

        }

        // Insert Asuransi Kerja
        $rowasurker =  count($request->idasker);
        TadAsuransiKerja::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowasurker; $i++) {
            $dataasurker = [
                "idasker"=>request('idasker')[$i],
                "idtad"=>$id,
                "no_ektp"=>request('no_ektp'),
                "nik_tad"=>request('nik_tad'),
                "idprovasuransi"=>request('idprovasuransi2')[$i],
                "idprogasuransi"=>request('idprogasuransi2')[$i],
                "no_kpj"=>request('no_kpj')[$i],
                "tgl_kpj"=>request('tgl_kpj')[$i],
                "npp"=>request('npp')[$i],
                "no_jpn"=>request('no_jpn')[$i],
                "is_deleted"=>0
            ];

            if (request('idasker')[$i]!=null || request('idasker')[$i] != ''  ) {
                TadAsuransiKerja::where('idasker',request('idasker')[$i])->update($dataasurker);
            } else {
                TadAsuransiKerja::create($dataasurker);
            }

        }

        // Insert Riwayat kerja
        $rowriwayatkerja =  count($request->idriwayatkerja);
        TadRiwayatKerja::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);
        // dd($request);
        for ($i=0; $i < $rowriwayatkerja; $i++) {
            $datariwayatkerja = [
                "idriwayatkerja"=>request('idriwayatkerja')[$i],
                "idtad"=>$id,
                "no_ektp"=>request('no_ektp'),
                "nm_corp"=>request('nm_corp')[$i],
                "almt_corp"=>request('almt_corp')[$i],
                "telp_corp"=>request('telp_corp')[$i],
                "usaha_corp"=>request('usaha_corp')[$i],
                "jabakhir_corp"=>request('jabakhir_corp')[$i],
                "statuspeg_corp"=>request('statuspeg_corp')[$i],
                "nmatasan_corp"=>request('nmatasan_corp')[$i],
                "jbtatasan_corp"=>request('jbtatasan_corp')[$i],
                "tmtawal_corp"=>request('tmtawal_corp')[$i],
                "tmtakhir_corp"=>request('tmtakhir_corp')[$i],
                "alasan"=>request('alasan')[$i],
                "upahakhir"=>request('upahakhir')[$i],
                "is_deleted"=>0
            ];

            if (request('idriwayatkerja')[$i]!=null || request('idriwayatkerja')[$i] != ''  ) {
                TadRiwayatKerja::where('idriwayatkerja',request('idriwayatkerja')[$i])->update($datariwayatkerja);
            } else {
                TadRiwayatKerja::create($datariwayatkerja);
            }

        }

         // Insert Pendidikan
        $rowpendidikan =  count($request->idpendidikan);
        TadPendidikan::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowpendidikan; $i++) {
            $datapendidikan = [
                "idpendidikan"=>request('idpendidikan')[$i],
                "tingkatsekolah"=>request('tingkatsekolah')[$i],
                "namasekolah"=>request('namasekolah')[$i],
                "kota"=>request('kota')[$i],
                "jurusan"=>request('jurusan')[$i],
                "tahunmasuk"=>request('tahunmasuk')[$i],
                "tahunlulus"=>request('tahunlulus')[$i],
                "keterangan"=>request('keterangan')[$i],
                "no_ektp"=>request('no_ektp'),
                "idtad"=>$id,
                "is_deleted"=>0
            ];

            if (request('idpendidikan')[$i]!=null || request('idpendidikan')[$i] != ''  ) {

                TadPendidikan::where('idpendidikan',request('idpendidikan')[$i])->update($datapendidikan);
            } else {
                TadPendidikan::create($datapendidikan);
            }

        }

         // Insert sim
        $rowsim =  count($request->idsim);
        TadSim::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowsim; $i++) {
            $datasim = [
                "idsim"=>request('idsim')[$i],
                "jenis_sim"=>request('jenis_sim')[$i],
                "no_sim"=>request('no_sim')[$i],
                "tglakhir_sim"=>request('tglakhir_sim')[$i],
                "no_ektp"=>request('no_ektp'),
                "idtad"=>$id,
                "is_deleted"=>0
            ];

            if (request('idsim')[$i]!=null || request('idsim')[$i] != ''  ) {
                TadSim::where('idsim',request('idsim')[$i])->update($datasim);
            } else {
                TadSim::create($datasim);
            }

        }

          // Insert seragam
        $rowseragam =  count($request->idseragam);
        TadSeragam::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);

        for ($i=0; $i < $rowseragam; $i++) {
            $dataseragam = [
                "idseragam"=>request('idseragam')[$i],
                "tinggi_badan"=>request('tinggi_badan')[$i],
                "berat_badan"=>request('berat_badan')[$i],
                "ukuran_baju"=>request('ukuran_baju')[$i],
                "ukuran_celana"=>request('ukuran_celana')[$i],
                "ukuran_sepatu"=>request('ukuran_sepatu')[$i],
                "no_ektp"=>request('no_ektp'),
                "idtad"=>$id,
                "is_deleted"=>0
            ];

            if (request('idseragam')[$i]!=null || request('idseragam')[$i] != ''  ) {
                TadSeragam::where('idseragam',request('idseragam')[$i])->update($dataseragam);
            } else {
                TadSeragam::create($dataseragam);
            }

        }

        // Insert Keluarga Tidak serumah
        $rowkeluarga =  count($request->idkeluarga);

        TadKeluarga::where('no_ektp',request('no_ektp'))->update(['is_deleted'=>1]);
        for ($i=0; $i < $rowkeluarga; $i++) {
            $datakeluarga = [
                "idkeluarga"=>request('idkeluarga')[$i],
                "nm_kel"=>request('nm_kel')[$i],
                "hub_kel"=>request('hub_kel')[$i],
                "alamat_kel"=>request('alamat_kel')[$i],
                "telp_kel"=>request('telp_kel')[$i],
                "agama"=>request('agama')[$i],
                "status_alamat"=>request('status_alamat')[$i],
                "no_ektp"=>request('no_ektp'),
                "idtad"=>$id,
                "is_deleted"=>0
            ];

            if (request('idkeluarga')[$i]!=null || request('idkeluarga')[$i] != ''  ) {

                TadKeluarga::where('idkeluarga',request('idkeluarga')[$i])->update($datakeluarga);
            } else {
                TadKeluarga::create($datakeluarga);
            }

        }

        return redirect('/Tad')->with('status','Data TAD Berhasil Di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Tad  $Tad
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
            $kota = Kota::orderBy('idkota','Asc')->get();
        }else {
            $kota = Kota::where('idprovinsi', $id)->get();
        }

        echo json_encode([
            "kota" => $kota,
            "status" => 200
        ]);
    }

    public function getProvinsi($id){
        // $Provinsi = Provinsi::where('kd_prov', $id)->get();
        $Provinsi = Provinsi::orderBy('idprovinsi','Asc')->get();

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
