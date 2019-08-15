@extends('layouts.adminlte')
@section('css')

<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.css') }}">
@endsection

@section('content')



<div class="content-wrapper">

    <section class="content">
        <div class="content-header">

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <h3><b>Tambah Data TAD</b></h3>
                   </div>

                   <div class="card-body">
                    <form method="POST" action="{{ route('Tad.simpandata') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- Start Pemisah kolom form 1  --}}
                        <div class="row"> 

                            <div class="col-6">

                                {{-- NO EKTP --}}
                                <div class="form-group row">
                                    <label for="no_ektp" class="col-md-3 col-form-label-sm text-md-left">No EKTP</label>

                                    <div class="col-md-9">
                                        <input id="no_ektp" type="text" class="form-control form-control-sm{{ $errors->has('no_ektp') ? ' is-invalid' : '' }}" name="no_ektp" value="{{ old('no_ektp') }}" required autofocus>

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

                                        <input type="file" id="inputgambar" name="gambar" text="pilih ektp" required class="validate "/>
                                        @if ($errors->has('inputgambar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inputgambar') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                        <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:100px;float:left;" />
                                    </div>   
                                </div>

                                {{-- gambar diri --}}
                                <div class="form-group row">
                                    <label for="inputgambardiri" class="col-md-3 col-form-label-sm text-md-left">Foto Diri</label>

                                    <div class="input-field col-md-9 col-form-label-sm text-md-left"">

                                        <input type="file" id="inputgambardiri" name="gambardiri" text="pilih ektp" required class="validate "/>
                                        @if ($errors->has('inputgambardiri'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inputgambardiri') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                        <img src="http://placehold.it/100x100" id="showgambardiri" style="max-width:200px;max-height:100px;float:left;" />
                                    </div>   
                                </div>

                                {{-- NIK TAD --}}
                                <div class="form-group row">
                                    <label for="nik_tad" class="col-md-3 col-form-label-sm text-md-left">NIK TAD</label>

                                    <div class="col-md-9">
                                        <input id="nik_tad" type="text" class="form-control form-control-sm{{ $errors->has('nik_tad') ? ' is-invalid' : '' }}" name="nik_tad" value="{{ old('nik_tad') }}" required autofocus>

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
                                            @foreach ($Cabang as $item)
                                            <option value="{{ $item ->idcabang }}">{{ $item ->idcabang }} | {{ $item ->cabang }}</option>   
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
                                        <input id="nm_lengkaptad" type="text" class="form-control form-control-sm{{ $errors->has('nm_lengkaptad') ? ' is-invalid' : '' }}" name="nm_lengkaptad" value="{{ old('nm_lengkaptad') }}" required autofocus>

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
                                        <input id="tmp_lahir" type="text" class="form-control form-control-sm{{ $errors->has('tmp_lahir') ? ' is-invalid' : '' }}" name="tmp_lahir" value="{{ old('tmp_lahir') }}" required autofocus>

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
                                        <input id="tgl_lahir"  type="date" class="form-control form-control-sm{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>

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
                                        <input id="telp" type="number" class="form-control form-control-sm{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ old('telp') }}" required>

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
                                        <select name="jenis_kel" class="form-control form-control-sm" id="jenis_kel">
                                            <option value="Laki-Laki">Laki-Laki</option>  
                                            <option value="Wanita">Wanita</option>  
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
                                        <select name="statusperkawinan" class="form-control form-control-sm" id="statusperkawinan">
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>  
                                            <option value="Cerai">Cerai</option>  
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
                                        <select name="warga_negara" id="warga_negara" class="form-control form-control-sm" >
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>                                
                                        </select>
                                    </div>   
                                </div>

                                {{-- Gol Darah --}}
                                <div class="form-group row">
                                    <label for="gol_darah" class="col-md-3 col-form-label-sm text-md-left">Gol Darah</label>
                                    <div class="col-md-9">
                                        <select name="gol_darah" id="gol_darah" class="form-control form-control-sm" >
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
                                        <input id="nm_ibukandung" type="text" class="form-control form-control-sm{{ $errors->has('nm_ibukandung') ? ' is-invalid' : '' }}" name="nm_ibukandung" value="{{ old('nm_ibukandung') }}" required autofocus>

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
                                        <input id="catatan" type="text" class="form-control form-control-sm{{ $errors->has('catatan') ? ' is-invalid' : '' }}" name="catatan" value="{{ old('catatan') }}" required autofocus>

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
                                        <input id="emailadd" type="text" class="form-control form-control-sm{{ $errors->has('emailadd') ? ' is-invalid' : '' }}" name="emailadd" value="{{ old('emailadd') }}" required autofocus>

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
                                        <input id="npwptad" type="text" class="form-control form-control-sm{{ $errors->has('npwptad') ? ' is-invalid' : '' }}" name="npwptad" value="{{ old('npwptad') }}" required autofocus>

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
                                        <select name="agama" id="agama" class="form-control form-control-sm" >
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>                                
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>   
                                </div>

                            </div>
                            {{-- End Pemisah kolom form 2  --}}
                        </div>
                        {{-- End Row form  --}}

                        

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
<script src="{{ asset('adminlte/plugins/select2/js/select2.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>


<script type="text/javascript">
   $(document).ready(function() { 

    $('#idcabang').select2();

} );
</script>
<script type="text/javascript">

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
@endsection
