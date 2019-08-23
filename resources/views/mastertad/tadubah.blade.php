@extends('layouts.adminlte')


@section('css')
{{-- 
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.css') }}">
  <style type="text/css">
  .input_table{
    border: none;
    background: transparent;
}
</style>
@endsection


@section('content')


<div class="content-wrapper">

    <section class="content">
        <div class="content-header">

        </div>

        <div class="row">
            <div class="col-12">
                <form id="formtad" method="POST" action="{{ route('Tad.ubahdata', $item->IDTad) }}" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Update Data TAD</b></h4>
                        </div>

                        @csrf
                        <div class="card-body">

                            {{-- Inputan Header --}}
                            <div class="row"> 

                                {{-- Start Pemisah kolom form 1  --}}
                               <div class="col-6">

                                {{-- NO EKTP --}}
                                <div class="form-group row">
                                    <label for="no_ektp" class="col-md-3 col-form-label-sm text-md-left">No EKTP</label>

                                    <div class="col-md-9">
                                        <input id="no_ektp" type="text" class="form-control form-control-sm{{ $errors->has('no_ektp') ? ' is-invalid' : '' }}" name="no_ektp" value="{{ $item->no_ektp }}" required autofocus>

                                        @if ($errors->has('no_ektp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('no_ektp') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- gambar ektp --}}
                                <div class="form-group row">
                                    <label for="inputgambar" class="col-md-3 col-form-label-sm text-md-left">Foto EKTP</label>

                                    <div class="input-field col-md-9 col-form-label-sm text-md-left"">

                                    <input type="file" id="inputgambar" name="gambar" text="pilih ektp" class="validate "/>
                                    @if ($errors->has('inputgambar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inputgambar') }}</strong>
                                        </span>
                                        @endif
                                  </div>
                                  <div class="col-md-3">
                                  </div>
                                    <div class="col-md-9">
                                        <img src="{{ asset('img_ektp/'.$item->gambar_ektp) }}" id="showgambar" style="max-width:200px;max-height:100px;float:left;" />
                                    </div>   
                                </div>

                                {{-- gambar diri --}}
                                <div class="form-group row">
                                    <label for="inputgambardiri" class="col-md-3 col-form-label-sm text-md-left">Foto Diri</label>

                                    <div class="input-field col-md-9 col-form-label-sm text-md-left"">

                                    <input type="file" id="inputgambardiri" name="gambardiri" text="pilih ektp" class="validate "/>
                                    @if ($errors->has('inputgambardiri'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inputgambardiri') }}</strong>
                                        </span>
                                        @endif
                                  </div>
                                  <div class="col-md-3">
                                  </div>
                                    <div class="col-md-9">
                                        <img src="{{ asset('img_fotodiri/'.$item->foto_diri) }}" id="showgambardiri" style="max-width:200px;max-height:100px;float:left;" />
                                    </div>   
                                </div>

                                {{-- NIK TAD --}}
                                <div class="form-group row">
                                    <label for="nik_tad" class="col-md-3 col-form-label-sm text-md-left">NIK TAD</label>

                                    <div class="col-md-9">
                                        <input id="nik_tad" type="text" class="form-control form-control-sm{{ $errors->has('nik_tad') ? ' is-invalid' : '' }}" name="nik_tad" value="{{ $item->nik_tad }}" required autofocus>

                                        @if ($errors->has('nik_tad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nik_tad') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- CABANG DTU --}}
                                <div class="form-group row">
                                    <label for="idcabang" class="col-md-3 col-form-label-sm text-md-left">Cabang DTU</label>

                                    <div class="col-md-9">
                                        <select name="idcabang" class="form-control form-control-sm" id="idcabang">
                                            <option value="">--Pilih--</option>
                                            @foreach ($Cabang as $data)
                                            <option {{ $data->idcabang == $item->idcabang ? "selected":"" }} value="{{ $data->idcabang }}">{{ $data->cabang }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('idcabang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('idcabang') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- NAMA LENGKAP TAD --}}
                                <div class="form-group row">
                                    <label for="nm_lengkaptad" class="col-md-3 col-form-label-sm text-md-left">Nama Lengkap</label>

                                    <div class="col-md-9">
                                        <input id="nm_lengkaptad" type="text" class="form-control form-control-sm{{ $errors->has('nm_lengkaptad') ? ' is-invalid' : '' }}" name="nm_lengkaptad" value="{{ $item->nm_lengkaptad }}" required autofocus>

                                        @if ($errors->has('nm_lengkaptad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nm_lengkaptad') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Tempat Lahir --}}
                                <div class="form-group row">
                                    <label for="tmp_lahir" class="col-md-3 col-form-label-sm text-md-left">Tempat Lahir</label>

                                    <div class="col-md-9">
                                        <input id="tmp_lahir" type="text" class="form-control form-control-sm{{ $errors->has('tmp_lahir') ? ' is-invalid' : '' }}" name="tmp_lahir" value="{{ $item->tmp_lahir }}" required autofocus>

                                        @if ($errors->has('tmp_lahir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tmp_lahir') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                </div>
                                {{-- End Pemisah kolom form 1 --}}

                                {{-- Start Pemisah kolom form 2  --}}
                                <div class="col-6">

                                {{-- Tanggal Lahir --}}
                                <div class="form-group row">
                                    <label for="Tgl Lahir" class="col-md-3 col-form-label-sm text-md-left ">Tgl Lahir</label>

                                    <div class="col-md-9">
                                        <input id="tgl_lahir"  type="date" class="form-control form-control-sm{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" value="{{ $item->tgl_lahir }}" required>

                                        @if ($errors->has('tgl_lahir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 {{-- telp --}}
                                <div class="form-group row">
                                    <label for="telp" class="col-md-3 col-form-label-sm text-md-left">Telp</label>

                                    <div class="col-md-9">
                                        <input id="telp" type="number" class="form-control form-control-sm{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ $item->telp }}" required>

                                        @if ($errors->has('telp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telp') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Jenis kelamin --}}
                                <div class="form-group row">
                                    <label for="jenis_kel" class="col-md-3 col-form-label-sm text-md-left">Jenis Kelamin</label>

                                    <div class="col-md-9">
                                        <select name="jenis_kel" class="form-control form-control-sm" id="jenis_kel" value="{{ $item->jenis_kel }}">
                                            <option {{ $item->jenis_kel=="Laki-Laki" ? "selected":"" }} value="Laki-Laki">Laki-Laki</option>
                                            <option {{ $item->jenis_kel=="Wanita" ? "selected":"" }} value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('jenis_kel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_kel') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- Status Perkawinan --}}
                                <div class="form-group row">
                                    <label for="statusperkawinan" class="col-md-3 col-form-label-sm text-md-left">Status Perkawinan</label>

                                    <div class="col-md-9">
                                        <select name="statusperkawinan" class="form-control form-control-sm" id="statusperkawinan" value="{{ $item->statusperkawinan }}">
                                            <option {{ $item->statusperkawinan=="Belum Kawin" ? "selected":"" }} value="Belum Kawin">Belum Kawin</option>
                                            <option {{ $item->statusperkawinan=="Kawin" ? "selected":"" }} value="Kawin">Kawin</option>
                                            <option {{ $item->statusperkawinan=="Cerai" ? "selected":"" }} value="Cerai">Cerai</option>

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
                                    <label for="warga_negara" class="col-md-3 col-form-label-sm text-md-left">Warga Negara</label>
                                    <div class="col-md-9">
                                        <select name="warga_negara" id="warga_negara" class="form-control form-control-sm" value="{{ $item->warga_negara }}">
                                            <option {{ $item->warga_negara=="WNI" ? "selected":"" }} value="WNI">WNI</option>
                                            <option {{ $item->warga_negara=="WNA" ? "selected":"" }} value="WNA">WNA</option>

                                        </select>
                                    </div>   
                                </div>

                                {{-- Gol Darah --}}
                                <div class="form-group row">
                                    <label for="gol_darah" class="col-md-3 col-form-label-sm text-md-left">Gol Darah</label>
                                    <div class="col-md-9">
                                        <select name="gol_darah" id="gol_darah" class="form-control form-control-sm" value="{{ $item->gol_darah }}">
                                            <option {{ $item->gol_darah=="A" ? "selected":"" }} value="A">A</option>
                                            <option {{ $item->gol_darah=="B" ? "selected":"" }} value="B">B</option>
                                            <option {{ $item->gol_darah=="AB" ? "selected":"" }} value="AB">AB</option>
                                            <option {{ $item->gol_darah=="O" ? "selected":"" }} value="O">O</option>

                                            <option value="A">A</option>
                                            <option value="B">B</option>                                
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>   
                                </div>

                                {{--  Ibu Kandung --}}
                                <div class="form-group row">
                                    <label for="nm_ibukandung" class="col-md-3 col-form-label-sm text-md-left">Nama Ibu Kandung</label>

                                    <div class="col-md-9">
                                        <input id="nm_ibukandung" type="text" class="form-control form-control-sm{{ $errors->has('nm_ibukandung') ? ' is-invalid' : '' }}" name="nm_ibukandung" value="{{ $item->nm_ibukandung }}" required autofocus>

                                        @if ($errors->has('nm_ibukandung'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nm_ibukandung') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{--  Catatan --}}
                                <div class="form-group row">
                                    <label for="catatan" class="col-md-3 col-form-label-sm text-md-left">Catatan</label>

                                    <div class="col-md-9">
                                        <input id="catatan" type="text" class="form-control form-control-sm{{ $errors->has('catatan') ? ' is-invalid' : '' }}" name="catatan" value="{{ $item->catatan }}" required autofocus>

                                        @if ($errors->has('catatan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('catatan') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{--  Email --}}
                                <div class="form-group row">
                                    <label for="emailadd" class="col-md-3 col-form-label-sm text-md-left">Email </label>

                                    <div class="col-md-9">
                                        <input id="emailadd" type="text" class="form-control form-control-sm{{ $errors->has('emailadd') ? ' is-invalid' : '' }}" name="emailadd" value="{{ $item->emailadd }}" required autofocus>

                                        @if ($errors->has('emailadd'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('emailadd') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{--  NPWP tad --}}
                                <div class="form-group row">
                                    <label for="npwptad" class="col-md-3 col-form-label-sm text-md-left">NPWP TAD</label>

                                    <div class="col-md-9">
                                        <input id="npwptad" type="text" class="form-control form-control-sm{{ $errors->has('npwptad') ? ' is-invalid' : '' }}" name="npwptad" value="{{ $item->npwptad }}" required autofocus>

                                        @if ($errors->has('npwptad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('npwptad') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Agama --}}
                                <div class="form-group row">
                                    <label for="agama" class="col-md-3 col-form-label-sm text-md-left">Agama</label>
                                    <div class="col-md-9">
                                        <select name="agama" id="agama" class="form-control form-control-sm" value="{{ $item->agama }}">
                                            <option {{ $item->agama=="Islam" ? "selected":"" }} value="Islam">Islam</option>
                                            <option {{ $item->agama=="Kristen Katolik" ? "selected":"" }} value="Kristen Katolik">Kristen Katolik</option>
                                            <option {{ $item->agama=="Kristen Protestan" ? "selected":"" }} value="Kristen Protestan">Kristen Protestan</option>
                                            <option {{ $item->agama=="Hindu" ? "selected":"" }} value="Hindu">Hindu</option>
                                            <option {{ $item->agama=="Budha" ? "selected":"" }} value="Budha">Budha</option>

                                        </select>
                                    </div>   
                                </div>

                                </div>
                                {{-- End Pemisah kolom form 2  --}}
                            </div>
                            {{-- End Inputan Header Row form  --}}

                        </div>

                    </div>
                    <div class="card mb">
                        <div class="card text-center mb">
                            <div class="card-header px py">
                                <ul class="nav nav-pills card-header-pills mx" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-alamat-tab" data-toggle="pill" href="#pills-alamat" role="tab" aria-controls="pills-alamat" aria-selected="true">Alamat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-rekening-tab" data-toggle="pill" href="#pills-rekening" role="tab" aria-controls="pills-rekening" aria-selected="false">Rekening</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-kk-tab" data-toggle="pill" href="#pills-kk" role="tab" aria-controls="pills-kk" aria-selected="false">Kartu Keluarga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-asurkes-tab" data-toggle="pill" href="#pills-asurkes" role="tab" aria-controls="pills-asurkes" aria-selected="false">Asuransi Kesehatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-asurker-tab" data-toggle="pill" href="#pills-asurker" role="tab" aria-controls="pills-asurker" aria-selected="false">Asuransi Kerja</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-riwayatkerja-tab" data-toggle="pill" href="#pills-riwayatkerja" role="tab" aria-controls="pills-riwayatkerja" aria-selected="false">Riwayat Kerja</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-pendidikan-tab" data-toggle="pill" href="#pills-pendidikan" role="tab" aria-controls="pills-pendidikan" aria-selected="false">Pendidikan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-sim-tab" data-toggle="pill" href="#pills-sim" role="tab" aria-controls="pills-sim" aria-selected="false">SIM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-keluarga-tab" data-toggle="pill" href="#pills-keluarga" role="tab" aria-controls="pills-keluarga" aria-selected="false">Keluarga Tidak Serumah</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-seragam-tab" data-toggle="pill" href="#pills-seragam" role="tab" aria-controls="pills-seragam" aria-selected="false">Seragam</a>
                                    </li>
                                </ul>


                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-alamat" role="tabpanel" aria-labelledby="pills-alamat-tab">
                                    @include('mastertad.tadubah_alamat')
                                </div>
                                <div class="tab-pane fade" id="pills-rekening" role="tabpanel" aria-labelledby="pills-rekening-tab" >
                                    @include('mastertad.tadubah_rekening')
                                </div>
                                <div class="tab-pane fade" id="pills-kk" role="tabpanel" aria-labelledby="pills-kk-tab" >
                                    @include('mastertad.tadubah_kk')
                                </div>
                                <div class="tab-pane fade" id="pills-asurkes" role="tabpanel" aria-labelledby="pills-asurkes-tab">
                                    @include('mastertad.tadubah_asurkes')
                                </div>
                                <div class="tab-pane fade" id="pills-asurker" role="tabpanel" aria-labelledby="pills-asurker-tab">
                                    @include('mastertad.tadubah_asurker')
                                </div>
                                <div class="tab-pane fade" id="pills-riwayatkerja" role="tabpanel" aria-labelledby="pills-riwayatkerja-tab">
                                    @include('mastertad.tadubah_riwayatkerja')
                                </div>
                                <div class="tab-pane fade" id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-pendidikan-tab">
                                    @include('mastertad.tadubah_pendidikan')
                                </div>
                                <div class="tab-pane fade" id="pills-sim" role="tabpanel" aria-labelledby="pills-sim-tab">
                                    @include('mastertad.tadubah_sim')
                                </div>
                                <div class="tab-pane fade" id="pills-keluarga" role="tabpanel" aria-labelledby="pills-keluarga-tab">
                                    @include('mastertad.tadubah_keluarga')
                                </div>
                                <div class="tab-pane fade" id="pills-seragam" role="tabpanel" aria-labelledby="pills-seragam-tab">
                                    @include('mastertad.tadubah_seragam')
                                </div>

                            </div>

                        </div>
                        <span style="float:" class="mt-3">
                            <div class="form-group row">
                                <div class="col-md-4"></div>    
                                <div class="col-md-4 ">
                                    <button  id="simpantad" class="btn btn-block btn-primary">
                                        <i class="fas fa-save mr-2"></i>Simpan Data
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="col-md-3"></div>         --}}
                        </span>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection



@section('script')
    {{-- 
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script> --}}
    <script src="{{ asset('adminlte/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>

    {{-- Script Form --}}
    <script>
        $(document).ready(function() {

            $("#simpantad").click(function(e){
                var txt;
                var r = confirm("Simpan Perubahan Data ?");
                if (r == true) {
                    $("#formtad").submit();
                    // window.location = "/Tad/"+aja+"/edit";
                }else{
                    e.preventDefault();
                } 
            });

        } );

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showgambar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showgambardiri').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputgambar").change(function () {
            readURL(this);
        });

        $("#inputgambardiri").change(function () {
            readURL2(this);
        });

    </script>

    {{-- Script Data Alamat --}}
    <script>

        $(document).ready(function() {

            $('#tabelalamat td:nth-child(14)').hide();
            $('#tabelalamat th:nth-child(14)').hide();
            $('#tabelalamat td:nth-child(15)').hide();
            $('#tabelalamat th:nth-child(15)').hide();
            $('#tabelalamat td:nth-child(13)').hide();
            $('#tabelalamat th:nth-child(13)').hide();


            $('#selectprovinsi').select2();
            $('#selectkota').select2();

            $("#selectprovinsi").change(function() {
                setKota('0');
            });


        } );

        function setKota(id){
            base_url = window.location.origin;
            //     $("#nm_prov").val($('#selectprovinsi option:selected').text());
            // idp = $('#selectprovinsi option:selected').val();
            idp = $("#idprovinsi"+id).val();

            idkota = $("#idkota"+id).val();
            // console.log(id);
            if (id=='0'){
                idp = $('#selectprovinsi option:selected').val();
            }
                // console.log(idp);

            $("#selectkota").empty();
            $("#selectkota").append('<option>-- Pilih --</option>');
            $.ajax({
              url: base_url+"/getKota/"+idp,
              success: function(data){
                var json = JSON.parse(data);
                console.log(id);

                $.each(json.kota, function(i, item) {

                    $("#selectkota").append('<option value="'+item.idkota+'">'+item.nm_kota+'</option>');

                    if (item.idkota == idkota){
                        $("#selectkota option[value='" + item.idkota +"']").attr("selected","selected");
                    }
                });

            }
        });
        }

        function setProvinsi(id){
            base_url = window.location.origin;
            $("#selectprovinsi").empty();
            $("#selectprovinsi").append('<option>-- Pilih --</option>');
            idprov = $("#idprovinsi"+id).val();
            if (idprov==""){
                idprov='0';
            }
            
            $.ajax({
              url: base_url+"/getProvinsi/"+idprov,
              success: function(data){
                var json = JSON.parse(data);
                // alert($("#idprovinsi").val());
                $.each(json.provinsi, function(i, item) {
                    // console.log(idprov)
                    $("#selectprovinsi").append('<option  value="'+item.idprovinsi+'">'+item.nm_provinsi+'</option>');
                    // console.log(item.idprovinsi+"###"+id);
                    if (item.idprovinsi == idprov){

                        $("#selectprovinsi option[value='" + item.idprovinsi +"']").attr("selected","selected");
                        $("#idprovinsi").val(item.idprovinsi);
                        // $("#selectprovinsi select").val('item.idprovinsi');
                    }

                });

            }
        });
        }

        function refreshalamat(){
            id = '0';
            $('#updatealamatbtn').hide();
            $('#tambahalamatbtn').show();
            $('#alamattad').val('');
            $('#status_alamat').val('');


            $('#kecamatantad').val('');
            $('#desakelurahantad').val('');
            $('#rt_tad').val('');
            $('#rw_tad').val('');
            $('#kodepos').val('');
            $('#no_hpphone').val('');
            $('#idalamattadtampung').val('');

            setProvinsi(id);
            setKota(id);
        }

        function editalamat(id){
            $('#updatealamatbtn').show();
            $('#tambahalamatbtn').hide();
            $('#alamattad').val($('#alamattad'+id).val());
          
            $('#status_alamat').val($('#status_alamat'+id).val());
            $('#nik_tadalamat').val($('#nik_tadalamat'+id).val());


            $('#kecamatantad').val($('#kecamatantad'+id).val());
            $('#desakelurahantad').val($('#desakelurahantad'+id).val());
            $('#rt_tad').val($('#rt_tad'+id).val());
            $('#rw_tad').val($('#rw_tad'+id).val());
            $('#kodepos').val($('#kodepos'+id).val());
            $('#idkota').val($('#idkota'+id).val());
            $('#idprovinsi').val($('#idprovinsi'+id).val());
            $('#no_hpphone').val($('#no_hpphone'+id).val());
            $('#idalamattadtampung').val(id);

            setProvinsi(id);
            setKota(id);
        }

        function updaterowalamat(){
            id = $('#idalamattadtampung').val();
            $('#kecamatantad'+id).val($('#kecamatantad').val());
            $('#desakelurahantad'+id).val($('#desakelurahantad').val());
            $('#rt_tad'+id).val($('#rt_tad').val());
            $('#rw_tad'+id).val($('#rw_tad').val());
            $('#kodepos'+id).val($('#kodepos').val());
            $('#no_hpphone'+id).val($('#no_hpphone').val());
            $('#idprovinsi'+id).val($('#selectprovinsi option:selected').val());
            $('#nm_provinsi'+id).val($('#selectprovinsi option:selected').text());
            $('#idkota'+id).val($('#selectkota option:selected').val());
            $('#nm_kota'+id).val($('#selectkota option:selected').text());
            $('#status_alamat'+id).val($('#status_alamat').val());
            $('#alamattad'+id).val($('#alamattad').val());


        }

        function tambahrowalamat(){
            var baris= $('#tabelalamat tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisalamatke'+idbaris+'">'+
            '<td>'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap >'+
            '<a id="btnedit_alamat" href="#" onclick="editalamat('+idbaris+')" data-toggle="modal" data-target="#modal_alamat" title="Edit Data"><i class="fas fa-edit mr-2"></i></a>'+
            '<a href="#" onclick="hapusbarisalamat('+idbaris+')" title="Hapus Data"> <i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:100px ;" class="input_table" id="status_alamat'+idbaris+'" readonly type="text" name="status_alamat[]" value="'+$('#status_alamat').val()+'"></td>'+
            '<td><input style="width:500px ;" class="input_table" id="alamattad'+idbaris+'" readonly type="text" name="alamattad[]" value="'+$('#alamattad').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="nm_provinsi'+idbaris+'" readonly type="text" name="nm_provinsi[]" value="'+$('#selectprovinsi option:selected').text()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="nm_kota'+idbaris+'" readonly type="text" name="nm_kota[]" value="'+$('#selectkota option:selected').text()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="kecamatantad'+idbaris+'" readonly type="text" name="kecamatantad[]" value="'+$('#kecamatantad').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="desakelurahantad'+idbaris+'" readonly type="text" name="desakelurahantad[]" value="'+$('#desakelurahantad').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="rt_tad'+idbaris+'" readonly type="text" name="rt_tad[]" value="'+$('#rt_tad').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="rw_tad'+idbaris+'" readonly type="text" name="rw_tad[]" value="'+$('#rw_tad').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="kodepos'+idbaris+'" readonly type="text" name="kodepos[]" value="'+$('#kodepos').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="no_hpphone'+idbaris+'" readonly type="text" name="no_hpphone[]" value="'+$('#no_hpphone').val()+'"></td>'+
            '<td ><input class="input_table" id="idalamattad'+idbaris+'" readonly type="text" name="idalamattad[]" value=""></td>'+
            '<td ><input class="input_table" id="idprovinsi'+idbaris+'" readonly type="text" name="idprovinsi[]" value="'+$('#selectprovinsi option:selected').val()+'"></td>'+
            '<td ><input class="input_table" id="idkota'+idbaris+'" readonly type="text" name="idkota[]" value="'+$('#selectkota option:selected').val()+'"></td>'+
            '</tr>';

            $('#tabelalamat').append(markup);


            $('#tabelalamat td:nth-child(14)').hide();
            $('#tabelalamat th:nth-child(14)').hide();
            $('#tabelalamat td:nth-child(15)').hide();
            $('#tabelalamat th:nth-child(15)').hide();
            $('#tabelalamat td:nth-child(13)').hide();
            $('#tabelalamat th:nth-child(13)').hide();
        }

        function hapusbarisalamat(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Alamat",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisalamatke"+id).remove();
            }
        });
        }
        
    </script>

    {{-- Script Data Kartu Keluarga --}}
    <script>

        $(document).ready(function() {

            $('#tabelkk td:nth-child(12)').hide();
            $('#tabelkk th:nth-child(12)').hide();

        } );

        function refreshkk(){
            $('#updatekkbtn').hide();
            $('#tambahkkbtn').show();
            $('#no_ektpkk').val('');
            $('#nik_kk').val('');
            $('#nama_kk').val('');
            $('#tmp_lahirkk').val('');
            $('#tgl_lahirkk').val('');
            $('#telp_hpkk').val('');
            
            $('#idkktadtampung').val('');

        }

        function editkk(id){
            $('#updatekkbtn').show();
            $('#tambahkkbtn').hide();

            $('#no_ektpkk').val($('#no_ektpkk'+id).val());
            $('#nik_kk').val($('#nik_kk'+id).val());
            $('#nama_kk').val($('#nama_kk'+id).val());
            $('#hub_keluarga').val($('#hub_keluarga'+id).val());
            $('#tmp_lahirkk').val($('#tmp_lahirkk'+id).val());
            $('#tgl_lahirkk').val($('#tgl_lahirkk'+id).val());
            $('#hub_keluarga').val($('#hub_keluarga'+id).val());
            $('#selectjenkel_kk').val($('#jenkel_kk'+id).val());
            $('#selectgoldarah_kk').val($('#goldarah_kk'+id).val());
            $('#telp_hpkk').val($('#telp_hpkk'+id).val());
            
            $('#idkktadtampung').val(id);

        }

        function updaterowkk(){
            id = $('#idkktadtampung').val();
            $('#nama_kk'+id).val($('#nama_kk').val());
            $('#hub_keluarga'+id).val($('#hub_keluarga option:selected').val());
            $('#tmp_lahirkk'+id).val($('#tmp_lahirkk').val());
            $('#tgl_lahirkk'+id).val($('#tgl_lahirkk').val());
            $('#jenkel_kk'+id).val($('#selectjenkel_kk option:selected').val());
            $('#goldarah_kk'+id).val($('#selectgoldarah_kk option:selected').val());
            $('#telp_hpkk'+id).val($('#telp_hpkk').val());
            
        }

        function tambahrowkk(){
            var baris= $('#tabelkk tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="bariskkke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap >'+

            '<a id="btnedit_kk" href="#" onclick="editkk('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_kk2" ><i class="fas fa-edit mr-2"></i> </a>'+ 
            '<a href="#" onclick="hapusbariskk('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td ><input style="width:50px ;" class="input_table" id="nik_kk'+idbaris+'" readonly type="text" name="nik_kk[]" value="'+$('#nik_kk').val()+'"></td>'+
            '<td ><input style="width:50px ;" class="input_table" id="no_ektpkk'+idbaris+'" readonly type="text" name="no_ektpkk[]" value="'+$('#no_ektpkk').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="nama_kk'+idbaris+'" readonly type="text" name="nama_kk[]" value="'+$('#nama_kk').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="hub_keluarga'+idbaris+'" readonly type="text" name="hub_keluarga[]" value="'+$('#hub_keluarga').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tmp_lahirkk'+idbaris+'" readonly type="text" name="tmp_lahirkk[]" value="'+$('#tmp_lahirkk').val()+'"></td>'+
            '<td class="td_input"><input style="width:100px ;" class="input_table" id="tgl_lahirkk'+idbaris+'" readonly type="text" name="tgl_lahirkk[]" value="'+$('#tgl_lahirkk').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="jenkel_kk'+idbaris+'" readonly type="text" name="jenkel_kk[]" value="'+$('#selectjenkel_kk').val()+'"></td>'+
            '<td><input style="width:80px ;" class="input_table" id="goldarah_kk'+idbaris+'" readonly type="text" name="goldarah_kk[]" value="'+$('#selectgoldarah_kk').val()+'"></td>'+
            '<td><input style="width:80px ;" class="input_table" id="telp_hpkk'+idbaris+'" readonly type="text" name="telp_hpkk[]" value="'+$('#telp_hpkk').val()+'"></td>'+

            '<td ><input class="input_table" id="idkktad'+idbaris+'" readonly type="text" name="idkktad[]" value=""></td>'+
            '</tr>';

            $('#tabelkk').append(markup);
            $('#tabelkk td:nth-child(12)').hide();
            $('#tabelkk th:nth-child(12)').hide();


        }

        function hapusbariskk(id){
                Swal.fire({
                title: "Hapus Data ?",
                text: "Hapus Data Kartu Keluarga",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Hapus',
            // closeOnConfirm: false,
                    //closeOnCancel: false

                }).then(function(isConfirm){
                  if (isConfirm.value===true){
                    $("#bariskkke"+id).remove();
                }
            });
        }

    </script>

    {{-- Script Data ASKES --}}
    <script>

        $(document).ready(function() {

            $('#tabelaskes td:nth-child(10)').hide();
            $('#tabelaskes th:nth-child(10)').hide();
            $('#tabelaskes td:nth-child(11)').hide();
            $('#tabelaskes th:nth-child(11)').hide();
            $('#tabelaskes td:nth-child(12)').hide();
            $('#tabelaskes th:nth-child(12)').hide();

            $('#selectprovider').select2();
            $('#selectprogram').select2();


        } );

        function refreshaskes(){
            id = '0';
            $('#updateaskesbtn').hide();
            $('#tambahaskesbtn').show();
            $('#no_peserta_askes').val('');
            $('#no_daftar_askes').val('');
            $('#tgl_daftar_askes').val('');
            $('#faskes1').val('');
            $('#faskes2').val('');
            setprovider(id);
            setprogram(id);
  
            
            $('#idaskestampung').val('');

        }

        function setprovider(id){
            base_url = window.location.origin;
            $("#selectprovider").empty();
            $("#selectprovider").append('<option>-- Pilih --</option>');
            idpro = $('#idprovasuransi'+id).val();
            idwhere ='0';
            if (idpro==""){
                idpro='0';
            }
            $.ajax({
              url: base_url+"/getProviderAsuransi/"+idwhere,
              success: function(data){
                var json = JSON.parse(data);
                $.each(json.prov, function(i, item) {
                    $("#selectprovider").append('<option  value="'+item.idprovasuransi+'">'+item.nm_provider+'</option>');
                    if (item.idprovasuransi == idpro){
                        $("#selectprovider option[value='" + item.idprovasuransi +"']").attr("selected","selected");
                    }

                });

            }
        });
        }

        function setprogram(id){
            base_url = window.location.origin;
            $("#selectprogram").empty();
            $("#selectprogram").append('<option>-- Pilih --</option>');
            idparam = $('#idprogasuransi'+id).val();
            idprovider = $('#idprovasuransi'+id).val();
            if (idparam==""){
                idparam='0';
            }
            $.ajax({
              url: base_url+"/getProgramAsuransi/"+idprovider,
              success: function(data){
                var json = JSON.parse(data);
                $.each(json.programasuransi, function(i, item) {
                    $("#selectprogram").append('<option  value="'+item.idprogasuransi+'">'+item.nm_progasur+'</option>');
                    if (item.idprogasuransi == idparam){
                        $("#selectprogram option[value='" + item.idprogasuransi +"']").attr("selected","selected");
                    }
                });

            }
        });
        }


        function editaskes(id){
            $('#updateaskesbtn').show();
            $('#tambahaskesbtn').hide();

            $('#no_peserta_askes').val($('#no_peserta_askes'+id).val());
            $('#no_daftar_askes').val($('#no_daftar_askes'+id).val());
            $('#tgl_daftar_askes').val($('#tgl_daftar_askes'+id).val());
            $('#faskes1').val($('#faskes1'+id).val());
            $('#faskes2').val($('#faskes2'+id).val());
            
            $('#idaskestampung').val(id);

            setprovider(id);
            setprogram(id)

        }

        function updaterowaskes(){
            id = $('#idaskestampung').val();
            $('#no_peserta_askes'+id).val($('#no_peserta_askes').val());
            $('#no_daftar_askes'+id).val($('#no_daftar_askes').val());
            $('#tgl_daftar_askes'+id).val($('#tgl_daftar_askes').val());
            $('#faskes1'+id).val($('#faskes1').val());
            $('#faskes2'+id).val($('#faskes2').val());

            $('#idprovasuransi'+id).val($('#selectprovider option:selected').val());
            $('#nm_provider'+id).val($('#selectprovider option:selected').text());

            $('#idprogasuransi'+id).val($('#selectprogram option:selected').val());
            $('#nm_progasur'+id).val($('#selectprogram option:selected').text());


            
        }

        function tambahrowaskes(){
            var baris= $('#tabelaskes tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisaskeske'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_askes" href="#" onclick="editaskes('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_askes" ><i class="fas fa-edit mr-2"></a> '+
            '<a href="#" onclick="hapusbarisaskes('+idbaris+')" title+"Hapus Data"><i class="fas fa-trash mr-2"></a>'+
            '</td>'+

            {{-- <td>{{ $data->no_peserta_askes }}</td> --}}

            '<td ><input style="width:150px ;" class="input_table" id="no_peserta_askes'+idbaris+'" readonly type="text" name="no_peserta_askes[]" value="'+$('#no_peserta_askes').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="no_daftar_askes'+idbaris+'" readonly type="text" name="no_daftar_askes[]" value="'+$('#no_daftar_askes').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tgl_daftar_askes'+idbaris+'" readonly type="text" name="tgl_daftar_askes[]" value="'+$('#tgl_daftar_askes').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="nm_provider'+idbaris+'" readonly type="text" name="nm_provider[]" value="'+$('#selectprovider option:selected').text()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="nm_progasur'+idbaris+'" readonly type="text" name="nm_progasur[]" value="'+$('#selectprogram option:selected').text()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="faskes1'+idbaris+'" readonly type="text" name="faskes1[]" value="'+$('#faskes1').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="faskes2'+idbaris+'" readonly type="text" name="faskes2[]" value="'+$('#faskes2').val()+'"></td>'+
            '<td ><input class="input_table" id="idprovasuransi'+idbaris+'" readonly type="text" name="idprovasuransi[]" value="'+$('#selectprovider option:selected').val()+'"></td>'+
            '<td ><input class="input_table" id="idprogasuransi'+idbaris+'" readonly type="text" name="idprogasuransi[]" value="'+$('#selectprogram option:selected').val()+'"></td>'+
            '<td ><input class="input_table" id="idaskes'+idbaris+'" readonly type="text" name="idaskes[]" value=""></td>'+
            '</tr>';

            $('#tabelaskes').append(markup);
            $('#tabelaskes td:nth-child(10)').hide();
            $('#tabelaskes th:nth-child(10)').hide();
            $('#tabelaskes td:nth-child(11)').hide();
            $('#tabelaskes th:nth-child(11)').hide();
            $('#tabelaskes td:nth-child(12)').hide();
            $('#tabelaskes th:nth-child(12)').hide();


        }

        function hapusbarisaskes(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Asuransi Kesehatan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisaskeske"+id).remove();

            }
        });
            // $("#bariske"+id).remove();
        }
        
    </script>

    {{-- Script Data ASKER --}}
    <script>

        $(document).ready(function() {

            $('#tabelasker td:nth-child(9)').hide();
            $('#tabelasker th:nth-child(9)').hide();
            $('#tabelasker td:nth-child(10)').hide();
            $('#tabelasker th:nth-child(10)').hide();
            $('#tabelasker td:nth-child(11)').hide();
            $('#tabelasker th:nth-child(11)').hide();

            $('#selectprovider2').select2();
            $('#selectprogram2').select2();


        } );

        function refreshasker(){
            id = '0';
            $('#updateaskerbtn').hide();
            $('#tambahaskerbtn').show();
            $('#no_kpj').val('');
            $('#tgl_kpj').val('');
            $('#no_jpn').val('');
            $('#npp').val('');
            setprovider2(id);
            setprogram2(id);
            
            $('#idaskertampung').val('');

        }

        function setprovider2(id){
            base_url = window.location.origin;
            $("#selectprovider2").empty();
            $("#selectprovider2").append('<option>-- Pilih --</option>');
            idpro = $('#idprovasuransi2'+id).val();
            idwhere ='0';
            if (idpro==""){
                idpro='0';
            }
            $.ajax({
              url: base_url+"/getProviderAsuransi/"+idwhere,
              success: function(data){
                var json = JSON.parse(data);
                $.each(json.prov, function(i, item) {
                    $("#selectprovider2").append('<option  value="'+item.idprovasuransi+'">'+item.nm_provider+'</option>');
                    if (item.idprovasuransi == idpro){
                        $("#selectprovider2 option[value='" + item.idprovasuransi +"']").attr("selected","selected");
                    }

                });

            }
        });
        }

        function setprogram2(id){
            base_url = window.location.origin;
            $("#selectprogram2").empty();
            $("#selectprogram2").append('<option>-- Pilih --</option>');
            idparam = $('#idprogasuransi2'+id).val();
            idprovider = $('#idprovasuransi2'+id).val();
            if (idparam==""){
                idparam='0';
            }
            $.ajax({
              url: base_url+"/getProgramAsuransi/"+idprovider,
              success: function(data){
                var json = JSON.parse(data);
                $.each(json.programasuransi, function(i, item) {
                    $("#selectprogram2").append('<option  value="'+item.idprogasuransi+'">'+item.nm_progasur+'</option>');
                    if (item.idprogasuransi == idparam){
                        $("#selectprogram2 option[value='" + item.idprogasuransi +"']").attr("selected","selected");
                    }
                });

            }
        });
        }


        function editasker(id){
            $('#updateaskerbtn').show();
            $('#tambahaskerbtn').hide();

            $('#no_kpj').val($('#no_kpj'+id).val());
            $('#tgl_kpj').val($('#tgl_kpj'+id).val());
            $('#no_jpn').val($('#no_jpn'+id).val());
            $('#npp').val($('#npp'+id).val());
            
            $('#idaskertampung').val(id);

            setprovider2(id);
            setprogram2(id)

        }

        function updaterowasker(){
            id = $('#idaskertampung').val();
            $('#no_kpj'+id).val($('#no_kpj').val());
            $('#tgl_kpj'+id).val($('#tgl_kpj').val());
            $('#no_jpn'+id).val($('#no_jpn').val());
            $('#npp'+id).val($('#npp').val());

            $('#idprovasuransi2'+id).val($('#selectprovider2 option:selected').val());
            $('#nm_provider2'+id).val($('#selectprovider2 option:selected').text());
            $('#idprogasuransi2'+id).val($('#selectprogram2 option:selected').val());
            $('#nm_progasur2'+id).val($('#selectprogram2 option:selected').text());

            
        }

        function tambahrowasker(){
            var baris= $('#tabelasker tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisaskerke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_asker" href="#" onclick="editasker('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_asker" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarisasker('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:250px ;" class="input_table" id="nm_provider2'+idbaris+'" readonly type="text" name="nm_provider2[]" value="'+$('#selectprovider2 option:selected').text()+'"></td>'+
            '<td><input style="width:250px ;" class="input_table" id="nm_progasur2'+idbaris+'" readonly type="text" name="nm_progasur2[]" value="'+$('#selectprogram2 option:selected').text()+'"></td>'+
            '<td ><input style="width:150px ;" class="input_table" id="no_kpj'+idbaris+'" readonly type="text" name="no_kpj[]" value="'+$('#no_kpj').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tgl_kpj'+idbaris+'" readonly type="text" name="tgl_kpj[]" value="'+$('#tgl_kpj').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="no_jpn'+idbaris+'" readonly type="text" name="no_jpn[]" value="'+$('#no_jpn').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="npp'+idbaris+'" readonly type="text" name="npp[]" value="'+$('#npp').val()+'"></td>'+
            '<td ><input class="input_table" id="idprovasuransi2'+idbaris+'" readonly type="text" name="idprovasuransi2[]" value="'+$('#selectprovider2 option:selected').val()+'"></td>'+
            '<td ><input class="input_table" id="idprogasuransi2'+idbaris+'" readonly type="text" name="idprogasuransi2[]" value="'+$('#selectprogram2 option:selected').val()+'"></td>'+

            '<td ><input class="input_table" id="idasker'+idbaris+'" readonly type="text" name="idasker[]" value=""></td>'+
            '</tr>';

            $('#tabelasker').append(markup);
            $('#tabelasker td:nth-child(9)').hide();
            $('#tabelasker th:nth-child(9)').hide();
            $('#tabelasker td:nth-child(10)').hide();
            $('#tabelasker th:nth-child(10)').hide();
            $('#tabelasker td:nth-child(11)').hide();
            $('#tabelasker th:nth-child(11)').hide();

        }

        function hapusbarisasker(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Asuransi Kerja",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisaskerke"+id).remove();

            }
        });
        }
        

    </script>

    {{-- Script Data Riwayat Kerja --}}
    <script>

        $(document).ready(function() {

            $('#tabelriwayatkerja td:nth-child(15)').hide();
            $('#tabelriwayatkerja th:nth-child(15)').hide();

        } );

        function refreshriwayatkerja(){
            id = '0';
            $('#updateriwayatkerjabtn').hide();
            $('#tambahriwayatkerjabtn').show();
            $('#nm_corp').val('');
            $('#almt_corp').val('');
            $('#telp_corp').val('');
            $('#usaha_corp').val('');
            $('#jabakhir_corp').val('');
            $('#statuspeg_corp').val('');
            $('#nmatasan_corp').val('');
            $('#jbtatasan_corp').val('');
            $('#tmtawal_corp').val('');
            $('#tmtakhir_corp').val('');
            $('#alasan').val('');
            $('#upahakhir').val('');
            
            $('#idriwayatkerjatampung').val('');

        }   

        function editriwayatkerja(id){
            $('#updateriwayatkerjabtn').show();
            $('#tambahriwayatkerjabtn').hide();

            $('#nm_corp').val($('#nm_corp'+id).val());
            $('#almt_corp').val($('#almt_corp'+id).val());
            $('#telp_corp').val($('#telp_corp'+id).val());
            $('#usaha_corp').val($('#usaha_corp'+id).val());
            $('#jabakhir_corp').val($('#jabakhir_corp'+id).val());
            $('#statuspeg_corp').val($('#statuspeg_corp'+id).val());
            $('#nmatasan_corp').val($('#nmatasan_corp'+id).val());
            $('#jbtatasan_corp').val($('#jbtatasan_corp'+id).val());
            $('#tmtawal_corp').val($('#tmtawal_corp'+id).val());
            $('#tmtakhir_corp').val($('#tmtakhir_corp'+id).val());
            $('#alasan').val($('#alasan'+id).val());
            $('#upahakhir').val($('#upahakhir'+id).val());
            
            $('#idriwayatkerjatampung').val(id);


        }

        function updaterowriwayatkerja(){
            id = $('#idriwayatkerjatampung').val();
            $('#nm_corp'+id).val($('#nm_corp').val());
            $('#almt_corp'+id).val($('#almt_corp').val());
            $('#telp_corp'+id).val($('#telp_corp').val());
            $('#usaha_corp'+id).val($('#usaha_corp').val());
            $('#jabakhir_corp'+id).val($('#jabakhir_corp').val());
            $('#statuspeg_corp'+id).val($('#statuspeg_corp').val());
            $('#nmatasan_corp'+id).val($('#nmatasan_corp').val());
            $('#jbtatasan_corp'+id).val($('#jbtatasan_corp').val());
            $('#tmtawal_corp'+id).val($('#tmtawal_corp').val());
            $('#tmtakhir_corp'+id).val($('#tmtakhir_corp').val());
            $('#alasan'+id).val($('#alasan').val());
            $('#upahakhir'+id).val($('#upahakhir').val());

        }

        function tambahrowriwayatkerja(){
            var baris= $('#tabelriwayatkerja tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisriwayatkerjake'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_riwayatkerja" href="#" onclick="editriwayatkerja('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_riwayatkerja" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarisriwayatkerja('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:250px ;" class="input_table" id="nm_corp'+idbaris+'" readonly type="text" name="nm_corp[]" value="'+$('#nm_corp').val()+'"></td>'+
            '<td><input style="width:350px ;" class="input_table" id="almt_corp'+idbaris+'" readonly type="text" name="almt_corp[]" value="'+$('#almt_corp').val()+'"></td>'+
            '<td ><input style="width:100px ;" class="input_table" id="telp_corp'+idbaris+'" readonly type="text" name="telp_corp[]" value="'+$('#telp_corp').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="usaha_corp'+idbaris+'" readonly type="text" name="usaha_corp[]" value="'+$('#usaha_corp').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="jabakhir_corp'+idbaris+'" readonly type="text" name="jabakhir_corp[]" value="'+$('#jabakhir_corp').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="statuspeg_corp'+idbaris+'" readonly type="text" name="statuspeg_corp[]" value="'+$('#statuspeg_corp').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="nmatasan_corp'+idbaris+'" readonly type="text" name="nmatasan_corp[]" value="'+$('#nmatasan_corp').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="jbtatasan_corp'+idbaris+'" readonly type="text" name="jbtatasan_corp[]" value="'+$('#jbtatasan_corp').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tmtawal_corp'+idbaris+'" readonly type="text" name="tmtawal_corp[]" value="'+$('#tmtawal_corp').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tmtakhir_corp'+idbaris+'" readonly type="text" name="tmtakhir_corp[]" value="'+$('#tmtakhir_corp').val()+'"></td>'+
            '<td><input style="width:300px ;" class="input_table" id="alasan'+idbaris+'" readonly type="text" name="alasan[]" value="'+$('#alasan').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="upahakhir'+idbaris+'" readonly type="text" name="upahakhir[]" value="'+$('#upahakhir').val()+'"></td>'+

            '<td ><input class="input_table" id="idriwayatkerja'+idbaris+'" readonly type="text" name="idriwayatkerja[]" value=""></td>'+
            '</tr>';

            $('#tabelriwayatkerja').append(markup);
            $('#tabelriwayatkerja td:nth-child(15)').hide();
            $('#tabelriwayatkerja th:nth-child(15)').hide();

        }

        function hapusbarisriwayatkerja(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Riwayat Kerja",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisriwayatkerjake"+id).remove();

            }
        });
        }

    </script>

    {{-- Script Pendidikan --}}
    <script>

        $(document).ready(function() {

            $('#tabelpendidikan td:nth-child(10)').hide();
            $('#tabelpendidikan th:nth-child(10)').hide();

        } );

        function refreshpendidikan(){
            id = '0';
            $('#updatependidikanbtn').hide();
            $('#tambahpendidikanbtn').show();
            $('#tingkatsekolah').val('');
            $('#namasekolah').val('');
            $('#kota').val('');
            $('#jurusan').val('');
            $('#tahunmasuk').val('');
            $('#tahunlulus').val('');
            $('#keterangan').val('');
            
            $('#idpendidikantampung').val('');

        }   

        function editpendidikan(id){
            $('#updatependidikanbtn').show();
            $('#tambahpendidikanbtn').hide();

            $('#tingkatsekolah').val($('#tingkatsekolah'+id).val());
            $('#namasekolah').val($('#namasekolah'+id).val());
            $('#kota').val($('#kota'+id).val());
            $('#jurusan').val($('#jurusan'+id).val());
            $('#tahunmasuk').val($('#tahunmasuk'+id).val());
            $('#tahunlulus').val($('#tahunlulus'+id).val());
            $('#keterangan').val($('#keterangan'+id).val());
            
            $('#idpendidikantampung').val(id);


        }

        function updaterowpendidikan(){
            id = $('#idpendidikantampung').val();
            $('#tingkatsekolah'+id).val($('#tingkatsekolah').val());
            $('#namasekolah'+id).val($('#namasekolah').val());
            $('#kota'+id).val($('#kota').val());
            $('#jurusan'+id).val($('#jurusan').val());
            $('#tahunmasuk'+id).val($('#tahunmasuk').val());
            $('#tahunlulus'+id).val($('#tahunlulus').val());
            $('#keterangan'+id).val($('#keterangan').val());

        }

        function tambahrowpendidikan(){
            var baris= $('#tabelpendidikan tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barispendidikanke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_pendidikan" href="#" onclick="editpendidikan('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_pendidikan" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarispendidikan('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:100px ;" class="input_table" id="tingkatsekolah'+idbaris+'" readonly type="text" name="tingkatsekolah[]" value="'+$('#tingkatsekolah').val()+'"></td>'+
            '<td><input style="width:250px ;" class="input_table" id="namasekolah'+idbaris+'" readonly type="text" name="namasekolah[]" value="'+$('#namasekolah').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="kota'+idbaris+'" readonly type="text" name="kota[]" value="'+$('#kota').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="jurusan'+idbaris+'" readonly type="text" name="jurusan[]" value="'+$('#jurusan').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="tahunmasuk'+idbaris+'" readonly type="text" name="tahunmasuk[]" value="'+$('#tahunmasuk').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="tahunlulus'+idbaris+'" readonly type="text" name="tahunlulus[]" value="'+$('#tahunlulus').val()+'"></td>'+
            '<td><input style="width:350px ;" class="input_table" id="keterangan'+idbaris+'" readonly type="text" name="keterangan[]" value="'+$('#keterangan').val()+'"></td>'+

            '<td ><input class="input_table" id="idpendidikan'+idbaris+'" readonly type="text" name="idpendidikan[]" value=""></td>'+
            '</tr>';

            $('#tabelpendidikan').append(markup);
            $('#tabelpendidikan td:nth-child(10)').hide();
            $('#tabelpendidikan th:nth-child(10)').hide();

        }

        function hapusbarispendidikan(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Pendidikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barispendidikanke"+id).remove();
            }
        });
            // $("#bariske"+id).remove();
        }

    </script>

    {{-- Script sim --}}
    <script>

        $(document).ready(function() {

            $('#tabelsim td:nth-child(6)').hide();
            $('#tabelsim th:nth-child(6)').hide();

        } );

        function refreshsim(){
            id = '0';
            $('#updatesimbtn').hide();
            $('#tambahsimbtn').show();
            $('#no_sim').val('');
            $('#jenis_sim').val('');
            $('#tglakhir_sim').val('');
            
            $('#idsimtampung').val('');

        }   

        function editsim(id){
            $('#updatesimbtn').show();
            $('#tambahsimbtn').hide();

            $('#no_sim').val($('#no_sim'+id).val());
            $('#jenis_sim').val($('#jenis_sim'+id).val());
            $('#tglakhir_sim').val($('#tglakhir_sim'+id).val());
            
            $('#idsimtampung').val(id);


        }

        function updaterowsim(){
            id = $('#idsimtampung').val();
            $('#no_sim'+id).val($('#no_sim').val());
            $('#jenis_sim'+id).val($('#jenis_sim').val());
            $('#tglakhir_sim'+id).val($('#tglakhir_sim').val());

        }

        function tambahrowsim(){
            var baris= $('#tabelsim tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barissimke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_sim" href="#" onclick="editsim('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_sim" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarissim('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:100px ;" class="input_table" id="no_sim'+idbaris+'" readonly type="text" name="no_sim[]" value="'+$('#no_sim').val()+'"></td>'+
            '<td><input style="width:250px ;" class="input_table" id="jenis_sim'+idbaris+'" readonly type="text" name="jenis_sim[]" value="'+$('#jenis_sim').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="tglakhir_sim'+idbaris+'" readonly type="text" name="tglakhir_sim[]" value="'+$('#tglakhir_sim').val()+'"></td>'+

            '<td ><input class="input_table" id="idsim'+idbaris+'" readonly type="text" name="idsim[]" value=""></td>'+
            '</tr>';

            $('#tabelsim').append(markup);
            $('#tabelsim td:nth-child(6)').hide();
            $('#tabelsim th:nth-child(6)').hide();

        }

        function hapusbarissim(id){
            Swal.fire({
                title: "Hapus Data ?",
                text: "Hapus Data SIM",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barissimke"+id).remove();
            }
        });
            // $("#bariske"+id).remove();
        }

    </script>

    {{-- Script keluarga --}}
    <script>

        $(document).ready(function() {

            $('#tabelkeluarga td:nth-child(7)').hide();
            $('#tabelkeluarga th:nth-child(7)').hide();

        } );

        function refreshkeluarga(){
            id = '0';
            $('#updatekeluargabtn').hide();
            $('#tambahkeluargabtn').show();
            $('#nm_kel').val('');
            $('#hub_kel').val('');
            $('#alamat_kel').val('');
            $('#telp_kel').val('');
            
            $('#idkeluargatampung').val('');

        }   

        function editkeluarga(id){
            $('#updatekeluargabtn').show();
            $('#tambahkeluargabtn').hide();

            $('#nm_kel').val($('#nm_kel'+id).val());
            $('#hub_kel').val($('#hub_kel'+id).val());
            $('#alamat_kel').val($('#alamat_kel'+id).val());
            $('#telp_kel').val($('#telp_kel'+id).val());
            
            $('#idkeluargatampung').val(id);


        }

        function updaterowkeluarga(){
            id = $('#idkeluargatampung').val();
            $('#nm_kel'+id).val($('#nm_kel').val());
            $('#hub_kel'+id).val($('#hub_kel').val());
            $('#alamat_kel'+id).val($('#alamat_kel').val());
            $('#telp_kel'+id).val($('#telp_kel').val());

        }

        function tambahrowkeluarga(){
            var baris= $('#tabelkeluarga tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="bariskeluargake'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_keluarga" href="#" onclick="editkeluarga('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_keluarga" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbariskeluarga('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:200px ;" class="input_table" id="nm_kel'+idbaris+'" readonly type="text" name="nm_kel[]" value="'+$('#nm_kel').val()+'"></td>'+
            '<td><input style="width:150px ;" class="input_table" id="hub_kel'+idbaris+'" readonly type="text" name="hub_kel[]" value="'+$('#hub_kel').val()+'"></td>'+
            '<td ><input style="width:350px ;" class="input_table" id="alamat_kel'+idbaris+'" readonly type="text" name="alamat_kel[]" value="'+$('#alamat_kel').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="telp_kel'+idbaris+'" readonly type="text" name="telp_kel[]" value="'+$('#telp_kel').val()+'"></td>'+

            '<td ><input class="input_table" id="idkeluarga'+idbaris+'" readonly type="text" name="idkeluarga[]" value=""></td>'+
            '</tr>';

            $('#tabelkeluarga').append(markup);
            $('#tabelkeluarga td:nth-child(7)').hide();
            $('#tabelkeluarga th:nth-child(7)').hide();

        }

        function hapusbariskeluarga(id){
            Swal.fire({
                title: "Hapus Data ?",
                text: "Hapus Data Akses",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#bariskeluargake"+id).remove();
            }
        });
            // $("#bariske"+id).remove();
        }

    </script>

    {{-- Script seragam --}}
    <script>

        $(document).ready(function() {

            $('#tabelseragam td:nth-child(8)').hide();
            $('#tabelseragam th:nth-child(8)').hide();

        } );

        function refreshseragam(){
            id = '0';
            $('#updateseragambtn').hide();
            $('#tambahseragambtn').show();
            $('#tinggi_badan').val('');
            $('#berat_badan').val('');
            $('#ukuran_baju').val('');
            $('#ukuran_celana').val('');
            $('#ukuran_sepatu').val('');
            
            $('#idseragamtampung').val('');

        }   

        function editseragam(id){
            $('#updateseragambtn').show();
            $('#tambahseragambtn').hide();

            $('#tinggi_badan').val($('#tinggi_badan'+id).val());
            $('#berat_badan').val($('#berat_badan'+id).val());
            $('#ukuran_baju').val($('#ukuran_baju'+id).val());
            $('#ukuran_celana').val($('#ukuran_celana'+id).val());
            $('#ukuran_sepatu').val($('#ukuran_sepatu'+id).val());
            
            $('#idseragamtampung').val(id);


        }

        function updaterowseragam(){
            id = $('#idseragamtampung').val();
            $('#tinggi_badan'+id).val($('#tinggi_badan').val());
            $('#berat_badan'+id).val($('#berat_badan').val());
            $('#ukuran_baju'+id).val($('#ukuran_baju').val());
            $('#ukuran_celana'+id).val($('#ukuran_celana').val());
            $('#ukuran_sepatu'+id).val($('#ukuran_sepatu').val());

        }

        function tambahrowseragam(){
            var baris= $('#tabelseragam tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisseragamke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_seragam" href="#" onclick="editseragam('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_seragam" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarisseragam('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:200px ;" class="input_table" id="tinggi_badan'+idbaris+'" readonly type="text" name="tinggi_badan[]" value="'+$('#tinggi_badan').val()+'"></td>'+
            '<td><input style="width:200px ;" class="input_table" id="berat_badan'+idbaris+'" readonly type="text" name="berat_badan[]" value="'+$('#berat_badan').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="ukuran_baju'+idbaris+'" readonly type="text" name="ukuran_baju[]" value="'+$('#ukuran_baju').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="ukuran_celana'+idbaris+'" readonly type="text" name="ukuran_celana[]" value="'+$('#ukuran_celana').val()+'"></td>'+
            '<td ><input style="width:200px ;" class="input_table" id="ukuran_sepatu'+idbaris+'" readonly type="text" name="ukuran_sepatu[]" value="'+$('#ukuran_sepatu').val()+'"></td>'+
            '<td ><input class="input_table" id="idseragam'+idbaris+'" readonly type="text" name="idseragam[]" value=""></td>'+
            '</tr>';

            $('#tabelseragam').append(markup);
            $('#tabelseragam td:nth-child(8)').hide();
            $('#tabelseragam th:nth-child(8)').hide();

        }

        function hapusbarisseragam(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Seragam",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisseragamke"+id).remove();
            }
        });
            // $("#bariske"+id).remove();
        }

    </script>

    {{-- Script Data rekening --}}
    <script>

        $(document).ready(function() {

            $('#tabelrekening td:nth-child(7)').hide();
            $('#tabelrekening th:nth-child(7)').hide();
            $('#tabelrekening td:nth-child(6)').hide();
            $('#tabelrekening th:nth-child(6)').hide();
            
            $('#selectbank').select2();


        } );

        function refreshrekening(){
            id = '0';
            $('#updaterekeningbtn').hide();
            $('#tambahrekeningbtn').show();
            $('#jenis_bank').val('');
            $('#no_rekening').val('');
            setbank(id);
            
            $('#idrekeningtampung').val('');

        }

        function setbank(id){
            base_url = window.location.origin;
            $("#selectbank").empty();
            $("#selectbank").append('<option>-- Pilih --</option>');
            idbnk = $('#idbank'+id).val();
            idwhere ='0';
            if (idbnk==""){
                idbnk='0';
            }
            $.ajax({
              url: base_url+"/getBank/"+idwhere,
              success: function(data){
                var json = JSON.parse(data);
                $.each(json.bank, function(i, item) {
                    $("#selectbank").append('<option  value="'+item.idbank+'">'+item.nm_bank+'</option>');
                    if (item.idbank == idbnk){
                        $("#selectbank option[value='" + item.idbank +"']").attr("selected","selected");
                    }

                });

            }
        });
        }


        function editrekening(id){
            $('#updaterekeningbtn').show();
            $('#tambahrekeningbtn').hide();

            $('#jenis_bank').val($('#jenis_bank'+id).val());
            $('#no_rekening').val($('#no_rekening'+id).val());
            
            $('#idrekeningtampung').val(id);

            setbank(id);

        }

        function updaterowrekening(){
            id = $('#idrekeningtampung').val();
            $('#jenis_bank'+id).val($('#jenis_bank').val());
            $('#no_rekening'+id).val($('#no_rekening').val());

            $('#idbank'+id).val($('#selectbank option:selected').val());
            $('#nm_bank'+id).val($('#selectbank option:selected').text());

            
        }

        function tambahrowrekening(){
            var baris= $('#tabelrekening tbody tr').length;
            var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="barisrekeningke'+idbaris+'">'+
            '<td >'+idbaris+'</td>'+
            '<td style="width:80px ; text-align: center;" nowrap>'+
            '<a id="btnedit_rekening" href="#" onclick="editrekening('+idbaris+')" title="Edit Data" data-toggle="modal" data-target="#modal_rekening" ><i class="fas fa-edit mr-2"></i></a> '+
            '<a href="#" onclick="hapusbarisrekening('+idbaris+')" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:250px ;" class="input_table" id="nm_bank'+idbaris+'" readonly type="text" name="nm_bank[]" value="'+$('#selectbank option:selected').text()+'"></td>'+
            '<td><input style="width:250px ;" class="input_table" id="jenis_bank'+idbaris+'" readonly type="text" name="jenis_bank[]" value="'+$('#jenis_bank').val()+'"></td>'+
            '<td ><input style="width:250px ;" class="input_table" id="no_rekening'+idbaris+'" readonly type="text" name="no_rekening[]" value="'+$('#no_rekening').val()+'"></td>'+
            '<td ><input class="input_table" id="idbank'+idbaris+'" readonly type="text" name="idbank[]" value="'+$('#selectbank option:selected').val()+'"></td>'+

            '<td ><input class="input_table" id="idrekening'+idbaris+'" readonly type="text" name="idrekening[]" value=""></td>'+
            '</tr>';

            $('#tabelrekening').append(markup);


            $('#tabelrekening td:nth-child(7)').hide();
            $('#tabelrekening th:nth-child(7)').hide();
            $('#tabelrekening td:nth-child(6)').hide();
            $('#tabelrekening th:nth-child(6)').hide();


        }

        function hapusbarisrekening(id){
            Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Rekening",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#barisrekeningke"+id).remove();
            }
        });
            // $("#bariske"+id).remove();
        }
        

    </script>
    {{-- Widthm Kolom otomatis --}}
   {{--  <script type="text/javascript">
        $.fn.textWidth = function(text, font) {
        
        if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
        
        $.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
        
        return $.fn.textWidth.fakeEl.width();
        };

        $('.input_table').on('change', function() {
            var inputWidth = $(this).textWidth();
            $(this).css({
                width: inputWidth
            })
        }).trigger('change');


        function inputWidth(elem, minW, maxW) {
            elem = $(this);
            console.log(elem)
        }

        var targetElem = $('.input_table');

        inputWidth(targetElem);
    </script> --}}
    
    @endsection




