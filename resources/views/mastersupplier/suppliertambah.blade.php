@extends('layouts.layoutadmin')

@section('content')

<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              
              <span style="float: center;"><h3 class="box-title">Input Master Supplier </h3></span>
          </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('Supplier.simpandata') }}">
                        @csrf

                       
                        <div class="form-group row">
                        <label for="Kode_Supplier" class="col-md-4 col-form-label text-md-right">Kode_Supplier</label>

                            <div class="col-md-6">
                                <input id="Kode_Supplier" type="text" class="form-control{{ $errors->has('Kode_Supplier') ? ' is-invalid' : '' }}" name="Kode_Supplier" value="{{ old('Kode_Supplier') }}" required autofocus>

                                @if ($errors->has('Kode_Supplier'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Kode_Supplier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nama_Supplier" class="col-md-4 col-form-label text-md-right">Nama_Supplier</label>

                            <div class="col-md-6">
                                <input id="Nama_Supplier" type="text" class="form-control{{ $errors->has('Nama_Supplier') ? ' is-invalid' : '' }}" name="Nama_Supplier" value="{{ old('Nama_Supplier') }}" required>

                                @if ($errors->has('Nama_Supplier'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nama_Supplier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grup_Supplier" class="col-md-4 col-form-label text-md-right">Grup_Supplier</label>
                            <div class="col-md-6">
                            <select name="Grup_Supplier" id="Grup_Supplier" class="form-control" >
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
                            <label for="Telp_Supplier" class="col-md-4 col-form-label text-md-right">Telp_Supplier</label>

                            <div class="col-md-6">
                                <input id="Telp_Supplier" type="text" class="form-control{{ $errors->has('Telp_Supplier') ? ' is-invalid' : '' }}" name="Telp_Supplier" value="{{ old('Telp_Supplier') }}" required>

                                @if ($errors->has('Telp_Supplier'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Telp_Supplier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Alamat_Supplier" class="col-md-4 col-form-label text-md-right">Alamat_Supplier</label>

                            <div class="col-md-6">
                                <input id="Alamat_Supplier" type="text" row=2 class="form-control{{ $errors->has('Alamat_Supplier') ? ' is-invalid' : '' }}" name="Alamat_Supplier" value="{{ old('Alamat_Supplier') }}" required>

                                @if ($errors->has('Alamat_Supplier'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Alamat_Supplier') }}</strong>
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
