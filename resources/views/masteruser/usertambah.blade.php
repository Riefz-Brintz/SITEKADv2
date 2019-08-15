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
                <form id="formUser" method="POST" action="{{ route('User.simpandata') }}" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Tambah Data User</b></h4>
                        </div>

                        @csrf
                        <div class="card-body">

                            {{-- Inputan Header --}}
                            <div class="row"> 

                                {{-- Start Pemisah kolom form 1  --}}
                                <div class="col-12">

                                    {{-- Nama Role --}}
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label-sm text-md-left">Nama User</label>

                                        <div class="col-md-9">
                                            <input id="name" type="text" class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                                            @if ($errors->has('Role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label-sm text-md-left">Email</label>

                                        <div class="col-md-9">
                                            <input id="email" type="text" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required autofocus>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>  

                                    <div class="form-group row">
                                        <label for="password" class="col-md-3 col-form-label text-md-left">Password</label>

                                        <div class="col-md-9">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-3 col-form-label text-md-left">Confirm Password</label>

                                        <div class="col-md-9">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    {{-- Cabang--}}
                                    <div class="form-group row">
                                      <label for="idcabang" class="col-md-3 col-form-label text-md-left">Cabang</label>

                                      <div class="col-md-9">
                                        <select class="form-control" id="selectcabang" name="idcabang"  style="width: 100%">
                                          @foreach ($Cabang as $data)
                                          <option   value="{{ $data->idcabang }}">{{ $data->cabang }}</option>   
                                          @endforeach
                                      </select>
                                  </div>
                                  @if ($errors->has('idcabang'))
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('idcabang') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{-- Role--}}
                            <div class="form-group row">
                              <label for="idrole" class="col-md-3 col-form-label text-md-left">Role</label>

                              <div class="col-md-9">
                                <select class="form-control" id="selectrole" name="idrole" style="width: 100%">
                                  @foreach ($Role as $data)
                                  <option   value="{{ $data->idrole }}">{{ $data->nama_role }}</option>   
                                  @endforeach
                              </select>
                          </div>
                          @if ($errors->has('idrole'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('idrole') }}</strong>
                        </span>
                        @endif
                    </div>


                </div>
                {{-- End Pemisah kolom form 1 --}}
            </div>
            {{-- End Inputan Header Row form  --}}

        </div>

    </div>
    <div class="card border-danger mb">
        <span style="float:" class="mt-3">
            <div class="form-group row">
                <div class="col-md-4"></div>    
                <div class="col-md-4 ">
                    <button  id="simpanUser" class="btn btn-block btn-primary">
                        Simpan Data
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
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script> --}}
<script src="{{ asset('adminlte/plugins/select2/js/select2.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>

{{-- Script Form --}}
<script>
    $(document).ready(function() {
        $("#simpanUser").click(function(e){
            var txt;
            var r = confirm("Simpan Perubahan Data ?");
            if (r == true) {
                $("#formUser").submit();
            }else{
                e.preventDefault();
            } 
        });

            // $('#tableroledetail').DataTable();
            

        } );

    </script>

    {{-- Script Data User --}}
    <script>

        $(document).ready(function() {

            $('#selectcabang').select2();
            $('#selectrole').select2();

        } );

    </script>

    @endsection




