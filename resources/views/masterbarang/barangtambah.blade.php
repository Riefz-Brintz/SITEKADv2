@extends('layouts.layoutadmin')


@section('content')

<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              
              <span style="float: center;"><h3 class="box-title">Input Master Barang </h3></span>
          </div>
          <div class="box-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('Barang.simpandata') }}">
                        @csrf

                       
                        <div class="form-group row">
                        <label for="Kode_Barang" class="col-md-4 col-form-label text-md-right">Kode_Barang</label>

                            <div class="col-md-6">
                                <input id="Kode_Barang" type="text" class="form-control{{ $errors->has('Kode_Barang') ? ' is-invalid' : '' }}" name="Kode_Barang" value="{{ old('Kode_Barang') }}" required autofocus>

                                @if ($errors->has('Kode_Barang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Kode_Barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nama_Barang" class="col-md-4 col-form-label text-md-right">Nama_Barang</label>

                            <div class="col-md-6">
                                <input id="Nama_Barang" type="text" class="form-control{{ $errors->has('Nama_Barang') ? ' is-invalid' : '' }}" name="Nama_Barang" value="{{ old('Nama_Barang') }}" required>

                                @if ($errors->has('Nama_Barang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nama_Barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="IDSatuan" class="col-md-4 col-form-label text-md-right">Satuan Barang</label>

                            <div class="col-md-6">
                                <select name="IDSatuan" class="form-control select2nih" id="IDSatuan">
                                    <option value="">--Pilih--</option>
                                    @foreach ($Satuan as $item)
                                    <option value="{{ $item ->IDSatuan }}">{{ $item ->IDSatuan }} | {{ $item ->Satuan }}</option>   
                                    @endforeach
                                </select>
                            </div>
                                @if ($errors->has('Satuan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('IDSatuan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group row">
                            <label for="Harga_Barang" class="col-md-4 col-form-label text-md-right">Harga Barang</label>

                            <div class="col-md-6">
                                <input id="Harga_Barang" type="text" class="form-control{{ $errors->has('Harga_Barang') ? ' is-invalid' : '' }}" name="Harga_Barang" value="{{ old('Harga_Barang') }}" required>

                                @if ($errors->has('Harga_Barang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Harga_Barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grup_Barang" class="col-md-4 col-form-label text-md-right">Grup Barang</label>
                            <div class="col-md-6">
                            <select name="Grup_Barang" id="Grup_Barang" class="form-control" >
                                <option value="Umum">Umum</option>
                                <option value="Khusus">Khusus</option>
                            </select>
                        </div>   
                    </div>                     
 {{-- <span style="float: left;"><a href="{{ route('Barang') }}">Kembali</a></span> --}}

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

</section>
@endsection
