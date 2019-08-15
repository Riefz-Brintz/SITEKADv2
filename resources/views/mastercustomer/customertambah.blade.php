@extends('layouts.layoutadmin')

@section('content')

<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              
              <span style="float: center;"><h3 class="box-title">Input Master Customer </h3></span>
          </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('Customer.simpandata') }}">
                        @csrf

                       
                        <div class="form-group row">
                        <label for="Kode_Customer" class="col-md-4 col-form-label text-md-right">Kode_Customer</label>

                            <div class="col-md-6">
                                <input id="Kode_Customer" type="text" class="form-control{{ $errors->has('Kode_Customer') ? ' is-invalid' : '' }}" name="Kode_Customer" value="{{ old('Kode_Customer') }}" required autofocus>

                                @if ($errors->has('Kode_Customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Kode_Customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nama_Customer" class="col-md-4 col-form-label text-md-right">Nama_Customer</label>

                            <div class="col-md-6">
                                <input id="Nama_Customer" type="text" class="form-control{{ $errors->has('Nama_Customer') ? ' is-invalid' : '' }}" name="Nama_Customer" value="{{ old('Nama_Customer') }}" required>

                                @if ($errors->has('Nama_Customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nama_Customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grup_Customer" class="col-md-4 col-form-label text-md-right">Grup_Customer</label>
                            <div class="col-md-6">
                            <select name="Grup_Customer" id="Grup_Customer" class="form-control" >
                                <option value="Umum">Umum</option>
                                <option value="Khusus">Khusus</option>
                            </select>
                        </div>  
                    </div>


                        <div class="form-group row">
                            <label for="Contact_Person" class="col-md-4 col-form-label text-md-right">Contact_Person</label>

                            <div class="col-md-6">
                                <input id="Contact_Person" type="text" class="form-control{{ $errors->has('Contact_Person') ? ' is-invalid' : '' }}" name="Contact_Person" value="{{ old('Contact_Person') }}" required>

                                @if ($errors->has('Contact_Person'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Contact_Person') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Telp_Customer" class="col-md-4 col-form-label text-md-right">Telp_Customer</label>

                            <div class="col-md-6">
                                <input id="Telp_Customer" type="text" class="form-control{{ $errors->has('Telp_Customer') ? ' is-invalid' : '' }}" name="Telp_Customer" value="{{ old('Telp_Customer') }}" required>

                                @if ($errors->has('Telp_Customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Telp_Customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Alamat_Customer" class="col-md-4 col-form-label text-md-right">Alamat_Customer</label>

                            <div class="col-md-6">
                                <input id="Alamat_Customer" type="text" row=2 class="form-control{{ $errors->has('Alamat_Customer') ? ' is-invalid' : '' }}" name="Alamat_Customer" value="{{ old('Alamat_Customer') }}" required>

                                @if ($errors->has('Alamat_Customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Alamat_Customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="Jatuh_Tempo" class="col-md-4 col-form-label text-md-right">Jatuh_Tempo</label>

                            <div class="col-md-6">
                                <input id="Jatuh_Tempo" type="number" class="form-control{{ $errors->has('Jatuh_Tempo') ? ' is-invalid' : '' }}" name="Jatuh_Tempo" value="{{ old('Jatuh_Tempo') }}" required>

                                @if ($errors->has('Jatuh_Tempo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Jatuh_Tempo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <span style="float: right;">
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Data
                                </button>

                            </div>
                        </div>
                     </span>
                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>
</section>
@endsection
