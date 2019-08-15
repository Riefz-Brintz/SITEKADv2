@extends('layouts.layoutadmin')

@section('content')

<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              
              <span style="float: center;"><h3 class="box-title">Ubah Master Barang </h3></span>
          </div>
          <div class="box-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('Barang.ubah',$item->IDBarang) }}">
                        @csrf

                        <div class="form-group row">
                        <label for="Kode_Barang" class="col-md-4 col-form-label text-md-right">Kode_Barang</label>

                            <div class="col-md-6">
                                <input id="Kode_Barang" type="text" class="form-control{{ $errors->has('Kode_Barang') ? ' is-invalid' : '' }}" name="Kode_Barang" value="{{ $item->Kode_Barang }}"required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Nama_Barang" class="col-md-4 col-form-label text-md-right">Nama_Barang</label>

                            <div class="col-md-6">
                                <input id="Nama_Barang" type="text" class="form-control" name="Nama_Barang" value="{{ $item->Nama_Barang }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IDSatuan" class="col-md-4 col-form-label text-md-right">Satuan Barang</label>

                            <div class="col-md-6">
                                <select name="IDSatuan" class="form-control" id="IDSatuan">
                                    {{-- <option value="{{ $item ->IDSatuan }}">{{ $item ->IDSatuan }} | {{ $item ->Satuan }}</option> --}}
                                    @foreach ($PilihSatuan as $data)
                                       
                                        <option {{ $data->IDSatuan == $item->IDSatuan ? "selected":"" }} value="{{ $data ->IDSatuan }}">{{ $data ->IDSatuan }} | {{ $data ->Satuan }}</option> 

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
                            <label for="Harga_Barang" class="col-md-4 col-form-label text-md-right">Harga_Barang</label>

                            <div class="col-md-6">
                                <input id="Harga_Barang" type="text" class="form-control{{ $errors->has('Harga_Barang') ? ' is-invalid' : '' }}" name="Harga_Barang" value="{{ $item->Harga_Barang }}" required>

                                @if ($errors->has('Harga_Barang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Harga_Barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grup_Barang" class="col-md-4 col-form-label text-md-right">Grup_Barang</label>
                            <div class="col-md-6">
                            <select name="Grup_Barang" id="Grup_Barang" class="form-control" value="{{ $item->Grup_Barang }}">
                                <option {{ $item->Grup_Barang=="Khusus" ? "selected":"" }} value="Khusus">Khusus</option>
                                <option {{ $item->Grup_Barang=="Umum" ? "selected":"" }} value="Umum">Umum</option>
                            </select>
                        </div>
</div>
                        <span style="float: right;">
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Data
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
</section>

@endsection
