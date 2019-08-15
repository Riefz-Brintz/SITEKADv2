@extends('layouts.adminlte')


@section('css')

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
    
@endsection


@section('content')
    @include('mastertad.tad_keluarga')
    @include('mastertad.tad_sim')



<div class="content-wrapper">

<section class="content">
<div class="content-header">
    
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                 <h3><b>Update Data TAD</b></h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('Tad.ubah',$item->IDTad) }}">
                        @csrf
                    {{-- Inputan Header --}}
                    <div class="row"> 

                    {{-- Start Pemisah kolom form 1  --}}
                        <div class="col-6">
                            {{-- NO EKTP --}}
                            <div class="form-group row">
                                <label for="no_ektp" class="col-md-3 col-form-label text-md-left">No EKTP</label>

                                <div class="col-md-7">
                                    <input id="no_ektp" type="text" class="form-control{{ $errors->has('no_ektp') ? ' is-invalid' : '' }}" name="no_ektp" value="{{ $item->no_ektp }}" required>

                                    @if ($errors->has('no_ektp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_ektp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- NIK TAD --}}
                            <div class="form-group row">
                                <label for="nik_tad" class="col-md-3 col-form-label text-md-left">NIK TAD</label>

                                <div class="col-md-7">
                                    <input id="nik_tad" type="text" class="form-control{{ $errors->has('nik_tad') ? ' is-invalid' : '' }}" name="nik_tad" value="{{ $item->nik_tad }}" required autofocus>

                                    @if ($errors->has('nik_tad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nik_tad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- CABANG DTU --}}
                            <div class="form-group row">
                                <label for="branch_id" class="col-md-3 col-form-label text-md-left">Cabang DTU</label>

                                <div class="col-md-7">
                                    <select name="branch_id" class="form-control" id="branch_id">
                                        {{-- <option value="{{ $item->branch_id }}" selected >{{ $item->branch_id }}</option> --}}
                                        @foreach ($Branches as $data)
                                        <option {{ $data->idbranches == $item->branch_id ? "selected":"" }} value="{{ $data->idbranches }}">{{ $data->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('branch_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('branch_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            {{-- NAMA LENGKAP TAD --}}
                            <div class="form-group row">
                                <label for="nm_lengkaptad" class="col-md-3 col-form-label text-md-left">Nama Lengkap</label>

                                <div class="col-md-7">
                                    <input id="nm_lengkaptad" type="text" class="form-control{{ $errors->has('nm_lengkaptad') ? ' is-invalid' : '' }}" name="nm_lengkaptad" value="{{ $item->nm_lengkaptad }}" required autofocus>

                                    @if ($errors->has('nm_lengkaptad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_lengkaptad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- Tempat Lahir --}}
                            <div class="form-group row">
                                <label for="tmp_lahir" class="col-md-3 col-form-label text-md-left">Tempat Lahir</label>

                                <div class="col-md-7">
                                    <input id="tmp_lahir" type="text" class="form-control{{ $errors->has('tmp_lahir') ? ' is-invalid' : '' }}" name="tmp_lahir" value="{{ $item->tmp_lahir }}" required autofocus>

                                    @if ($errors->has('tmp_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tmp_lahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- Tanggal Lahir --}}
                            <div class="form-group row">
                                <label for="Tgl Lahir" class="col-md-3 col-form-label text-md-left ">Tgl Lahir</label>

                                <div class="col-md-7">
                                    <input id="tgl_lahir"  type="date" class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" value="{{ $item->tgl_lahir }}" required>

                                    @if ($errors->has('tgl_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- umur --}}
                            <div class="form-group row">
                                <label for="umur" class="col-md-3 col-form-label text-md-left">Umur</label>

                                <div class="col-md-7">
                                    <input id="umur" type="number" class="form-control{{ $errors->has('umur') ? ' is-invalid' : '' }}" name="umur" value="{{ $item->umur }}" required>

                                    @if ($errors->has('umur'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('umur') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- Jenis kelamin --}}
                            <div class="form-group row">
                                <label for="jenis_kel" class="col-md-3 col-form-label text-md-left">Jenis Kelamin</label>
                                <div class="col-md-7">
                                    <select name="jenis_kel" class="form-control" id="jenis_kel">
                                        @foreach ($Jeniskelamin as $data)
                                        <option {{ $data->id == $item->jenis_kel ? "selected":"" }} value="{{ $data ->id }}">{{ $data ->id }} | {{ $data ->name }}</option>   
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('jenis_kel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jenis_kel') }}</strong>
                                </span>
                                @endif
                            </div>
                              {{-- Agama --}}
                            <div class="form-group row">
                                <label for="agama" class="col-md-3 col-form-label text-md-left">Agama</label>
                                <div class="col-md-7">
                                    <select name="agama" id="agama" class="form-control" >
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>                                
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>   
                            </div>
                                
                        </div>
                    {{-- End Pemisah kolom form 1 --}}

                    {{-- Start Pemisah kolom form 2  --}}
                        <div class="col-6">

                            {{-- Status Perkawinan --}}
                            <div class="form-group row">
                                <label for="statusperkawinan" class="col-md-3 col-form-label text-md-left">Status Perkawinan</label>

                                <div class="col-md-7">
                                    <select name="statusperkawinan" class="form-control" id="statusperkawinan">
                                        <option value="">--Pilih--</option>
                                        @foreach ($Statusperkawinan as $data)
                                        <option  {{ $data->id == $item->statusperkawinan ? "selected":"" }} value="{{ $data ->id }}">{{ $data ->id }} | {{ $data ->name }}</option>   
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('statusperkawinan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('statusperkawinan') }}</strong>
                                </span>
                                @endif
                            </div>

                             {{-- Warga Negara --}}
                            <div class="form-group row">
                                <label for="warga_negara" class="col-md-3 col-form-label text-md-left">Warga Negara</label>
                                <div class="col-md-7">
                                    <select name="warga_negara" id="warga_negara" class="form-control" >
                                        <option {{ 'WNI' == $item->warga_negara ? "selected":"" }} value="WNI">WNI</option>
                                        <option {{ 'WNA' == $item->warga_negara ? "selected":"" }} value="WNA">WNA</option>                               
                                    </select>
                                </div>   
                            </div>

                             {{-- Gol Darah --}}
                            <div class="form-group row">
                                <label for="gol_darah" class="col-md-3 col-form-label text-md-left">Gol Darah</label>
                                <div class="col-md-7">
                                    <select name="gol_darah" id="gol_darah" class="form-control" >
                                        <option value="A">A</option>
                                        <option value="B">B</option>                                
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>   
                            </div>

                            {{--  Ibu Kandung --}}
                            <div class="form-group row">
                                <label for="nm_ibukandung" class="col-md-3 col-form-label text-md-left">Nama Ibu Kandung</label>

                                <div class="col-md-7">
                                    <input id="nm_ibukandung" type="text" class="form-control{{ $errors->has('nm_ibukandung') ? ' is-invalid' : '' }}" name="nm_ibukandung" value="{{ $item->nm_ibukandung }}" required autofocus>

                                    @if ($errors->has('nm_ibukandung'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_ibukandung') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--  Catatan --}}
                            <div class="form-group row">
                                <label for="catatan" class="col-md-3 col-form-label text-md-left">Catatan</label>

                                <div class="col-md-7">
                                    <input id="catatan" type="text" class="form-control{{ $errors->has('catatan') ? ' is-invalid' : '' }}" name="catatan" value="{{ $item->catatan }}" required autofocus>

                                    @if ($errors->has('catatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('catatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--  Email --}}
                            <div class="form-group row">
                                <label for="emailadd" class="col-md-3 col-form-label text-md-left">Email </label>

                                <div class="col-md-7">
                                    <input id="emailadd" type="text" class="form-control{{ $errors->has('emailadd') ? ' is-invalid' : '' }}" name="emailadd" value="{{ $item->emailadd }}" required autofocus>

                                    @if ($errors->has('emailadd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailadd') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--  NPWP tad --}}
                            <div class="form-group row">
                                <label for="npwptad" class="col-md-3 col-form-label text-md-left">NPWP TAD</label>

                                <div class="col-md-7">
                                    <input id="npwptad" type="text" class="form-control{{ $errors->has('npwptad') ? ' is-invalid' : '' }}" name="npwptad" value="{{ $item->npwptad }}" required autofocus>

                                    @if ($errors->has('npwptad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('npwptad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    {{-- End Pemisah kolom form 2  --}}
                    </div>
                    {{-- End Inputan Header Row form  --}}

                    

                    {{-- Tabel Data Pendidikan --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion4">
                          <div class="card">
                            <div class="card-header" id="headingOne4">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                  Data Pendidikan Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4" data-parent="#accordion4">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Pendidikan</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelpendidikan" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Tingkat Pendidikan</th>
                                       <th>Nama Sekolah</th>
                                       <th>Kota</th>
                                       <th>Jurusan</th>
                                       <th>Tahun Masuk</th>
                                       <th>Tahun Lulus</th>
                                       <th>Keterangan</th>
                                       <th>idpendidikan</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Pendidikantad as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idpendidikan) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->tingkatsekolah }}</td>
                                           <td>{{ $data->namasekolah }}</td> 
                                           <td>{{ $data->kota }}</td> 
                                           <td>{{ $data->jurusan }}</td> 
                                           <td>{{ $data->tahunmasuk }}</td> 
                                           <td>{{ $data->tahunlulus }}</td> 
                                           <td>{{ $data->keterangan }}</td> 
                                           <td>{{ $data->idpendidikan }}</td> 

                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                    <div class="row" data-target="#accordion11">
                        @include('mastertad.Pendidikan')
                    </div>

                    {{-- Tabel Data Bank --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion2">
                          <div class="card">
                            <div class="card-header" id="headingOne2">
                              <h5 class="mb-0">
                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                  Data Rekening
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordion2">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Rekening</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelrekening" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Kode Lembaga</th>
                                       <th>Nama Lembaga</th>
                                       <th>Jenis</th>
                                       <th>No Rekening</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Lembagakeu as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >
                                              <a href="{{ route('Tad.ubah',$data->idlembagakeu) }}" class="btn btn-success"> edit</a> | 
                                              <a href="#" onclick="hapus({{ $data->idlembagakeu }})" class="btn btn-danger">Hapus</a>
                                           </td>
                                           <td>{{ $data->kd_lembagakeu }}</td>
                                           <td>{{ $data->nm_lembagakeu }}</td> 
                                           <td>{{ $data->jenis_lembagakeu }}</td> 
                                           <td>{{ $data->no_rekening }}</td> 

                                          
                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                        </div>
                        </div>
                    </div>

                     {{-- Tabel Data Keluarga --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Data Keluarga Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info" id="btntambah_keluarga" data-toggle="modal" data-target="#modal_keluarga">Tambah Data Keluarga</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelkeluarga" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Nama Keluarga</th>
                                       <th>Hubungan Keluarga</th>
                                       <th>idkeluarga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Keluargatad as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <input class="btn btn-success" id="btnedit" type="button" value="Edit" data-toggle="modal" data-target="#modal_keluarga"> | <input class="btn btn-danger" id="btnhapus" name="btnhapus" type="button" value="Hapus">
                                            </td>
                                           
                                           <td>{{ $data->nm_kel }}</td>
                                           <td>{{ $data->hub_kel }}</td> 
                                           <td>{{ $data->idkeluarga }}</td> 
                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                     {{-- Tabel Data Riwayat Kerja --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion6">
                          <div class="card">
                            <div class="card-header" id="headingOne6">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
                                  Data Riwayat Kerja Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne6" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordion6">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Riwayat Kerja</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelriwayatkerja" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Nama Perusahaan</th>
                                       <th>Alamat Perusahaan</th>
                                       <th>Telp</th>
                                       <th>Jenis Usaha</th>
                                       <th>Jabatan Terakhir</th>
                                       <th>Status Pegawai</th>
                                       <th>Nama Atasan</th>
                                       <th>Jabatan Atasan</th>
                                       <th>Tgl Mulai Kerja</th>
                                       <th>Tgl Berhenti</th>
                                       <th>Alasan Berhenti</th>
                                       <th>Upah Terakhir</th>
                                       <th>idriwayatkerja</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Riwayatkerjatad as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idriwayatkerja) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->nm_corp }}</td>
                                           <td>{{ $data->almt_corp }}</td> 
                                           <td>{{ $data->telp_corp }}</td> 
                                           <td>{{ $data->usaha_corp }}</td> 
                                           <td>{{ $data->statuspeg_corp }}</td> 
                                           <td>{{ $data->nmatasan_corp }}</td> 
                                           <td>{{ $data->jbtatasan_corp }}</td> 
                                           <td>{{ $data->tmtawal_corp }}</td> 
                                           <td>{{ $data->tmtakhir_corp }}</td> 
                                           <td>{{ $data->alasan }}</td> 
                                           <td>{{ $data->upahakhir }}</td> 
                                           <td>{{ $data->idriwayatkerja }}</td> 

                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                    {{-- Tabel Data KK tad --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion5">
                          <div class="card">
                            <div class="card-header" id="headingOne5">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                                  Data Kartu Keluarga Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne5" class="collapse show" aria-labelledby="headingOne5" data-parent="#accordion5">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Kartu Keluarga</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelkk" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>NIK KK</th>
                                       <th>No EKTP</th>
                                       <th>Nama Lengkap</th>
                                       <th>Hubungan Keluarga</th>
                                       <th>Tempat Lahir</th>
                                       <th>Tgl Lahir</th>
                                       <th>Jenis Kelamin</th>
                                       <th>Gol Darah</th>
                                       <th>Telp</th>
                                       <th>Kode Faskes 1</th>
                                       <th>Nama Faskes 1</th>
                                       <th>Kode Faskes 2</th>
                                       <th>Nama Faskes 2</th>
                                       <th>idkktad</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Kartukeluargatad as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idkktad) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->nik_kk }}</td>
                                           <td>{{ $data->no_ektpkk }}</td>
                                           <td>{{ $data->nama_kk }}</td> 
                                           <td>{{ $data->hub_keluarga }}</td> 
                                           <td>{{ $data->tmp_lahir }}</td> 
                                           <td>{{ $data->tgl_lahir }}</td> 
                                           <td>{{ $data->jenkel_kk }}</td> 
                                           <td>{{ $data->goldarah }}</td> 
                                           <td>{{ $data->telp_hp }}</td> 
                                           <td>{{ $data->kd_faskes1 }}</td> 
                                           <td>{{ $data->nm_faskes1 }}</td> 
                                           <td>{{ $data->kdfaskes2 }}</td> 
                                           <td>{{ $data->nm_faskes2 }}</td> 
                                           <td>{{ $data->idkktad }}</td> 

                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                    {{-- Tabel Asuransi Kesehatan tad --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion7">
                          <div class="card">
                            <div class="card-header" id="headingOne7">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
                                  Data Asuransi Kesehatan Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordion7">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Asuransi Kesehatan</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelasuransikesehatan" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Provider</th>
                                       <th>Program</th>
                                       <th>No Peserta</th>
                                       <th>No Daftar</th>
                                       <th>Tgl Daftar</th>
                                       <th>No BU</th>
                                       <th>idasuransikes</th>
                                       <th>idprovasuransi</th>
                                       <th>idprogasuransi</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($TadAsuransiKesehatan as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idasuransikes) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->nm_provider }}</td>
                                           <td>{{ $data->nm_program }}</td>
                                           <td>{{ $data->no_peserta }}</td> 
                                           <td>{{ $data->no_daftar }}</td> 
                                           <td>{{ $data->tgl_daftar }}</td> 
                                           <td>{{ $data->no_bu }}</td> 
                                           <td>{{ $data->idasuransikes }}</td> 
                                           <td>{{ $data->idprovasuransi }}</td> 
                                           <td>{{ $data->idprogasuransi }}</td> 

                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                     {{-- Tabel Seragam tad --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion8">
                          <div class="card">
                            <div class="card-header" id="headingOne8">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                                  Data Seragam Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne8" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordion8">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Seragam</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelseragam" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Tinggi</th>
                                       <th>Berat</th>
                                       <th>Ukuran Baju</th>
                                       <th>Ukuran Celana</th>
                                       <th>Ukuran Sepatu</th>
                                       <th>idseragamtad</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($TadSeragam as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idseragamtad) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->tinggi_badan }}</td>
                                           <td>{{ $data->berat_badan }}</td>
                                           <td>{{ $data->ukuran_baju }}</td> 
                                           <td>{{ $data->ukuran_celana }}</td> 
                                           <td>{{ $data->ukuran_sepatu }}</td> 
                                           <td>{{ $data->idseragamtad }}</td> 
                                      
                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>

                     {{-- Tabel Alamat tad --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion9">
                          <div class="card">
                            <div class="card-header" id="headingOne9">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne9" aria-expanded="true" aria-controls="collapseOne9">
                                  Data Alamat Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne9" class="collapse show" aria-labelledby="headingOne9" data-parent="#accordion9">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Alamat</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelalamat" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Status</th>
                                       <th>alamat</th>
                                       <th>Provinsi</th>
                                       <th>Kota</th>
                                       <th>Kecamatan</th>
                                       <th>Desa/Kelurahan</th>
                                       <th>Rt</th>
                                       <th>RW</th>
                                       <th>Kode POS</th>
                                       <th>No HP</th>

                                       <th>idalamattad</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($TadAlamat as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idalamattad) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->status_alamat }}</td>
                                           <td>{{ $data->alamattad }}</td>
                                           <td>{{ $data->provinsitad }}</td> 
                                           <td>{{ $data->dati2tad }}</td> 
                                           <td>{{ $data->kecamatantad }}</td> 
                                           <td>{{ $data->desakelurahantad }}</td> 
                                           <td>{{ $data->rt_tad }}</td> 
                                           <td>{{ $data->rw_tad }}</td>
                                           <td>{{ $data->kodepos }}</td> 
                                           <td>{{ $data->no_hpphone }}</td> 

                                           <td>{{ $data->idalamattad }}</td> 
                                      
                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>
                      {{-- Tabel Asuransi Kerja tad --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion8">
                          <div class="card">
                            <div class="card-header" id="headingOne8">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                                  Data Asuransi Ketenagakerjaan Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne8" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordion8">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info">Tambah Data Asuransi Ketenagakerjaan</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelasuransikerja" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Provider</th>
                                       <th>Program</th>
                                       <th>No KPJ</th>
                                       <th>Tgl KPJ</th>
                                       <th>NPP</th>
                                       <th>No JPN</th>
                                       <th>idasuransikes</th>
                                       <th>idprovasuransi</th>
                                       <th>idprogasuransi</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($TadAsuransiKerja as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idasuransikerja) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->nm_provider }}</td>
                                           <td>{{ $data->nm_program }}</td>
                                           <td>{{ $data->no_kpj }}</td> 
                                           <td>{{ $data->tgl_kpj }}</td> 
                                           <td>{{ $data->npp }}</td> 
                                           <td>{{ $data->no_jpn }}</td> 
                                           <td>{{ $data->idasuransikerja }}</td> 
                                           <td>{{ $data->idprovasuransi }}</td> 
                                           <td>{{ $data->idprogasuransi }}</td> 

                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>
                    
                    {{-- Tabel Data Sim --}}
                    <div class="row">
                        <div class="col-12">
                            
                        <div id="accordion3">
                          <div class="card">
                            <div class="card-header" id="headingOne3">
                              <h5 class="mb-0">

                                <button class="btn btn-secondary btn-lg btn-block" type="button" value="Input" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                  Data SIM Tad
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3" data-parent="#accordion3">
                                <div class="card-header">
                                <span style="float: right;">
                                    <a href="#" class="btn btn-info"data-toggle="modal" data-target="#modal_sim">Tambah Data SIM</a>    
                                </span>
                                </div>
                              <div class="card-body">

                                <table id="tabelsim" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                       <th>Aksi</th>
                                       <th>Jenis SIM</th>
                                       <th>No SIM</th>
                                       <th>Tgl Berakhir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                        @foreach ($Simtad as $data)
                                          <?php $no++ ;?>
                                          <tr>
                                           <td style="width:50px">{{ $no }}</td>
                                           <td style="width:200px ; align-items: center;" >

                                              <a href="{{ route('Tad.ubah',$data->idsim) }}" class="btn btn-success">Edit</a> | 
                                              <a href="#"  class="btn btn-danger">Hapus</a>
                                            </td>
                                           
                                           <td>{{ $data->jenis_sim }}</td>
                                           <td>{{ $data->no_sim }}</td> 
                                           <td>{{ $data->tglakhir_sim }}</td> 
                                          </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                              </div>
                            </div>
                          </div>

                         

                         
                        </div>
                        </div>
                    </div>
                    
                    
           

                    <span style="float:">
                        <div class="form-group row">
                        <div class="col-md-4"></div>    
                        <div class="col-md-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Simpan Data
                                </button>
                        </div>
                        {{-- <div class="col-md-3"></div>         --}}
                    </div>
                    </span>
                </form>
            </div>

            <div class="card-footer">

            </div>
            
        </div>
        
    </div>
</div>
</div>


</section>





@endsection

@section('script')
    
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>

    <script>

        $(document).ready(function() {
            // Data Keluarga
            var tblkeluarga = $('#tabelkeluarga').DataTable( {
              "paging": false,
              "lengthChange": false,
              "searching": false,
              "ordering": false,
              "info": false,
              "autoWidth": false,
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]]
            } );
                        
            tblkeluarga.on( 'draw.dt', function () {
                var PageInfo = $('#tabelkeluarga').DataTable().page.info();
                 tblkeluarga.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );

            $('#tabelkeluarga tbody').on('click','tr','input' , function () {
                var tt = $('#tabelkeluarga').DataTable();
                var id = tt.row($(this).attr('id'));
                // var id2 = ;
                alert(tt.rows($(this).closest("tr")).data()[1].attr('id'));
              
                var baris = tblkeluarga.row( this ).data();
                var bar = baris[0]-1;

                if ($(this).attr('id') == "btnedit") {
                    editrow_keluarga(bar);

                }
                else {
                    removerow_keluarga(bar);
                 
                }
                // alert(bar)
               
            } );

            // $('#tabelkeluarga tbody').on('click', 'tr',($('#btnhapus')) , function () {
            //     var baris = tblkeluarga.row( this ).data();
            //     var bar = baris[0]-1;

            //     removerow_keluarga(bar);
               
            // } );
          


            $('#btntambah_keluarga').on('click',  function () {
                $("#stat_keluarga").val("tambah");
                
            } );


            $('#savekeluarga').on('click',  function () {
                var ss = $('#stat_keluarga').val();
                tambahrow_keluarga(ss);
                
            } );


             // DataTable SIM
            var tblsim = $('#tabelsim').DataTable( {
                  "paging": false,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": false,
                  "info": false,
                  "autoWidth": false,
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
            } );
                            
            tblsim.on( 'draw.dt', function () {
            var PageInfo = $('#tabelkeluarga').DataTable().page.info();
                 tblkeluarga.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );

         



        } );

        $(function () {
      

            $('#tabelrekening').DataTable({
              "paging": false,
              "lengthChange": false,
              "searching": false,
              "ordering": false,
              "info": false,
              "autoWidth": false,
              // "scrollX":true,
              // "scrollY":true,
            });


        });

    function tambahrow_keluarga(stat){
        if (stat=="tambah"){

            var tabel = $('#tabelkeluarga').DataTable();
            var jml = tabel.rows().count();
            // var cekidbarang = $("#IDBarang").val();
            jml++
                tabel.row.add( [
                    jml,
                    '<input class="btn btn-success" onclick="editkeluarga()" type="button" id="btnedit" value="edit" data-toggle="modal" data-target="#modal_keluarga"> | <input class="btn btn-danger"  id="btnhapus" type="button" value="hapus">',
                    $("#nm_kel").val(),
                    $("#hub_kel").val(),
                    1
                    ] ).draw();

                ;
        }

        if (stat=="update"){
                var tabel = $('#tabelkeluarga').DataTable();
                var id = $('#bariskeluarga').val();
                var nama = $('#nm_kel').val();
                var hub = $('#hub_kel').val();
                newData = [ id, nama, hub ] //Array, data here must match structure of table data
                tabel.row(i).data( newData ).draw();

        }
    }

    function removerow_keluarga(i){
        var tabel = $('#tabelkeluarga').DataTable();
         
        var r = confirm("Apakah anda yakin ?");
        if (r == true) {
            tabel.row(i).remove().draw();
            alert("Data Keluarga Berhasil Dihapus");
        } 
            // window.location = "/Tad/hapuskeluarga/"+i;
        // window.prompt("sometext","Data Berhasil Dihapus");

    }

    function editrow_keluarga(i){
        var tabel = $('#tabelkeluarga').DataTable();

        var nama_keluarga = tabel.cell( i, 2 ).data();
        var hub_keluarga = tabel.cell( i, 3 ).data();

        $("#nm_kel").val(nama_keluarga);
        $("#hub_kel").val(hub_keluarga);
        $("#bariskeluarga").val(i);
        $("#stat_keluarga").val("ubah");

    }

    function updaterow_keluarga(id,nama,hub){
     

    }

    function removerow_sim(i){
        var tabel = $('#tabelsim').DataTable();
        tabel.row(i).remove().draw();

    }




    </script>

    
@endsection




