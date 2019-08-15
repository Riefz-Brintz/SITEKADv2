@extends('layouts.layoutadmin')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style type="text/css">

</style>

@section('content')

<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                  <span style="float: center;"><h3 class="box-title">Input Transaksi Penjualan </h3></span>
              </div>

              <div class="box-body">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('Pembelian.simpandata') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-6">
                                        {{-- Nomor --}}
                                        <div class="form-group row">
                                            <label for="Nomor" class="col-md-4 col-form-label text-md-right">Nomor</label>

                                            <div class="col-md-6">
                                                <input id="Nomor" type="text" class="form-control{{ $errors->has('Nomor') ? ' is-invalid' : '' }}" name="Nomor" value="{{ old('Nomor') }}" required autofocus>

                                                @if ($errors->has('Nomor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Nomor') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Tanggal --}}
                                        <div class="form-group row">
                                            <label for="Tanggal" class="col-md-4 col-form-label text-md-right ">Tanggal</label>

                                            <div class="col-md-6">
                                                <input id="Tanggal"  type="date" class="form-control{{ $errors->has('Tanggal') ? ' is-invalid' : '' }}" name="Tanggal" value="{{ old('Tanggal') }}" required>

                                                @if ($errors->has('Tanggal'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Tanggal') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- IDCustomer --}}
                                        <div class="form-group row">
                                            <label for="Nama_Customer" class="col-md-4 col-form-label text-md-right">Customer</label>

                                            <div class="col-md-6">
                                                <select name="Nama_Customer" class="form-control select2nih" id="Nama_Customer" >
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($Customer as $item)
                                                    <option value="{{ $item ->IDCustomer."|".$item ->Nama_Customer }}">{{ $item ->Nama_Customer }}</option>   
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('Nama_Customer'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Nama_Customer') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        {{-- No SJ Customer --}}
                                        <div class="form-group row">
                                            <label for="No_PO_Customer" class="col-md-4 col-form-label text-md-right">No SJ Customer</label>

                                            <div class="col-md-6">
                                                <input id="No_PO_Customer" type="text" class="form-control{{ $errors->has('No_PO_Customer') ? ' is-invalid' : '' }}" name="No_PO_Customer" value="{{ old('No_PO_Customer') }}" required>

                                                @if ($errors->has('No_PO_Customer'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('No_PO_Customer') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Jatuh Tempo --}}
                                        <div class="form-group row">
                                            <label for="Jatuh_Tempo" class="col-md-4 col-form-label text-md-right">Jatuh_Tempo</label>
                                            <div class="col-md-6">
                                                <select name="Jatuh_Tempo" id="Jatuh_Tempo" class="form-control" >
                                                    <option value="N/A">N/A</option>
                                                    <option value="15">15</option>                                
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                    <option value="60">60</option>
                                                    <option value="90">90</option>

                                                </select>
                                            </div>   
                                        </div>    
                                    </div>  

                                    <div class="col-md-6">
                                        {{-- Tgl Jatuh Tempo --}}
                                        <div class="form-group row">
                                            <label for="Tgl_Jatuh_Tempo" class="col-md-4 col-form-label text-md-right input-tanggal">Tgl_Jatuh_Tempo</label>

                                            <div class="col-md-6">
                                                <input id="Tgl_Jatuh_Tempo" type="date" class="form-control{{ $errors->has('Tgl_Jatuh_Tempo') ? ' is-invalid' : '' }}" name="Tgl_Jatuh_Tempo" value="{{ old('Tgl_Jatuh_Tempo') }}" required>

                                                @if ($errors->has('Tgl_Jatuh_Tempo'))Tgl_Jatuh_Tempo
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Tgl_Jatuh_Tempo') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- IDGudang --}}
                                        <div class="form-group row">
                                            <label for="Gudang" class="col-md-4 col-form-label text-md-right">Gudang</label>

                                            <div class="col-md-6">
                                                <select name="Gudang" class="form-control select2nih" id="Gudang">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($Gudang as $item)
                                                    <option value="{{ $item ->IDGudang }}">{{ $item ->IDGudang }} | {{ $item ->Gudang }}</option>   
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('Gudang'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Gudang') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        {{-- Jenis Ppn --}}
                                        <div class="form-group row">
                                            <label for="Jenis_Faktur" class="col-md-4 col-form-label text-md-right">Jenis Ppn</label>
                                            <div class="col-md-6">
                                                <select name="Jenis_Faktur" id="Jenis_Faktur" class="form-control" >
                                                    <option value="N/A">N/A</option>
                                                    <option value="Include">Include</option>                                
                                                    <option value="Exclude">Exclude</option>
                                                </select>
                                            </div>   
                                        </div>       
                                        {{-- Jenis Diskon --}}
                                        <div class="form-group row">
                                            <label for="Jenis_Diskon" class="col-md-4 col-form-label text-md-right">Jenis Diskon</label>
                                            <div class="col-md-6">
                                                <select name="Jenis_Diskon" id="Jenis_Diskon" class="form-control" >
                                                    <option value="N/A">N/A</option>
                                                    <option value="Persen">Persen</option>                                
                                                    <option value="Nominal">Nominal</option>
                                                </select>
                                            </div>   
                                        </div>        
                                        {{-- Keterangan --}}
                                        <div class="form-group row">
                                            <label for="Keterangan" class="col-md-4 col-form-label text-md-right">Keterangan</label>

                                            <div class="col-md-6">
                                                <textarea rows="3" style="resize: none;" id="Keterangan" type="text" class="form-control{{ $errors->has('Keterangan') ? ' is-invalid' : '' }}" name="Keterangan" required>{{ $item->Keterangan }}</textarea>

                                                @if ($errors->has('Keterangan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Keterangan') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        {{-- Hidden IDCustomer --}}
                                        <div class="form-group row">
                                           {{--  <label for="IDCustomer" class="col-md-4 col-form-label text-md-right">IDCustomer</label> --}}

                                           <div class="col-md-6">
                                            <input id="IDCustomer" type="hidden" readonly class="form-control{{ $errors->has('IDCustomer') ? ' is-invalid' : '' }}" name="IDCustomer" value="{{ old('IDCustomer') }}" required autofocus>

                                            @if ($errors->has('IDCustomer'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('IDCustomer') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                        {{-- Hidden IDGUdang --}}
                                    <div class="form-group row">
                                       {{--  <label for="IDGudang" class="col-md-4 col-form-label text-md-right">IDGudang</label> --}}

                                       <div class="col-md-6">
                                        <input id="IDGudang" type="hidden" readonly class="form-control{{ $errors->has('IDGudang') ? ' is-invalid' : '' }}" name="IDGudang" value="{{ old('IDGudang') }}" required autofocus>

                                        @if ($errors->has('IDGudang'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('IDGudang') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>





        <ul class="nav nav-tabs" id="myTab" role="tablist" >
              <li class="nav-item">
                <a class="nav-link active" id="DetailBarang-tab" data-toggle="tab" href="#DetailBarang" role="tab" aria-controls="DetailBarang" aria-selected="true">Detail Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="DetailPembayaran-tab" data-toggle="tab" href="#DetailPembayaran" role="tab" aria-controls="DetailPembayaran" aria-selected="false">Pembayaran</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane active in" id="DetailBarang" role="tabpanel" aria-labelledby="DetailBarang-tab">

                {{-- Inputan Detail --}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="col-md-6">

                                    {{-- Kode Barang --}}
                                    <div class="form-group row">
                                        <label for="Kode_Barang" class="col-md-4 col-form-label text-md-right">Kode Barang</label>

                                        <div class="col-md-6">
                                            <select name="Kode_Barang" class="form-control select2nih" id="Kode_Barang" ">
                                                <option value="" id="PilihBarang">--Pilih--</option>
                                                @foreach ($Barang as $item)
                                                <option value="{{ $item ->IDBarang."|".$item ->Kode_Barang."|".$item ->Nama_Barang."|".$item ->Satuan ."|".$item ->Harga_Barang."|".$item ->IDSatuan }}">{{ $item ->Kode_Barang }} | {{ $item ->Nama_Barang }}</option>   
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('Kode_Barang'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Kode_Barang') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    {{-- Nama Barang --}}
                                    <div class="form-group row">
                                        <label for="Nama_Barang" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                                        <div class="col-md-6">
                                            <input id="Nama_Barang" type="text" readonly="" class="form-control{{ $errors->has('Nama_Barang') ? ' is-invalid' : '' }}" name="Nama_Barang" value="{{ old('Nama_Barang') }}" required autofocus="false">

                                            @if ($errors->has('Nama_Barang'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Nama_Barang') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Qty --}}
                                    <div class="form-group row">
                                        <label for="Qty" class="col-md-4 col-form-label text-md-right">Qty</label>

                                        <div class="col-md-6">
                                            <input id="Qty" type="number" oninput="hitung_subtotal()" class="form-control{{ $errors->has('Qty') ? ' is-invalid' : '' }}" name="Qty" value="{{ old('Qty') }}" required autofocus>

                                            @if ($errors->has('Qty'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Qty') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Satuan --}}
                                    <div class="form-group row">
                                        <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>

                                        <div class="col-md-6">
                                            <input id="Satuan" type="text" readonly="" class="form-control{{ $errors->has('IDSatuan') ? ' is-invalid' : '' }}" name="Satuan" value="{{ old('IDSatuan') }}" required autofocus>

                                            @if ($errors->has('Satuan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Satuan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    {{-- Harga --}}
                                    <div class="form-group row">
                                        <label for="Harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                                        <div class="col-md-6">
                                            <input id="Harga" type="text" readonly="" oninput="hitung_subtotal()" class="form-control{{ $errors->has('Harga') ? ' is-invalid' : '' }}" name="Harga" value="{{ old('Harga') }}" required autofocus>

                                            @if ($errors->has('Harga'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Harga') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Diskon --}}
                                    <div class="form-group row">
                                        <label for="Diskon" class="col-md-4 col-form-label text-md-right">Diskon</label>

                                        <div class="col-md-6">
                                            <input id="Diskon" type="number" oninput="hitung_subtotal()" class="form-control{{ $errors->has('Diskon') ? ' is-invalid' : '' }}" name="Diskon" value="{{ old('Diskon') }}" required autofocus>

                                            @if ($errors->has('Diskon'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Diskon') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Nilai Diskon --}}
                                    <div class="form-group row">
                                        <label for="Nilai_Diskon"  class="col-md-4 col-form-label text-md-right">Nilai Diskon</label>

                                        <div class="col-md-6">
                                            <input id="Nilai_Diskon" type="number" readonly class="form-control{{ $errors->has('Nilai_Diskon') ? ' is-invalid' : '' }}" name="Nilai_Diskon" value="{{ old('Nilai_Diskon') }}" required autofocus>

                                            @if ($errors->has('Nilai_Diskon'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Nilai_Diskon') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <label id="persen" for="persen" class="col-md-2 col-form-label text-md-right">%</label>
                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="form-group row">
                                        <label for="Subtotal" class="col-md-4 col-form-label text-md-right">Subtotal</label>

                                        <div class="col-md-6">
                                            <input id="Subtotal" type="number" readonly class="form-control{{ $errors->has('Subtotal') ? ' is-invalid' : '' }}" name="Subtotal" value="{{ old('Subtotal') }}" required autofocus>

                                            @if ($errors->has('Subtotal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Subtotal') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                {{-- Hidden IDBarang --}}
                            <div class="form-group row">
                                 {{--  <label for="IDBarang" class="col-md-4 col-form-label text-md-right">IDBarang</label> --}}

                                 <div class="col-md-6">
                                    <input id="IDBarang" type="hidden" readonly class="form-control{{ $errors->has('IDBarang') ? ' is-invalid' : '' }}" name="IDBarang" value="{{ old('IDBarang') }}" required autofocus>

                                    @if ($errors->has('IDBarang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('IDBarang') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Hidden IDSatuan --}}
                            <div class="form-group row">
                               {{--  <label for="IDSatuan" class="col-md-4 col-form-label text-md-right">IDSatuan</label> --}}

                               <div class="col-md-6">
                                <input id="IDSatuan" type="hidden" readonly class="form-control{{ $errors->has('IDSatuan') ? ' is-invalid' : '' }}" name="IDSatuan" value="{{ old('IDSatuan') }}" required autofocus>

                                @if ($errors->has('IDSatuan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('IDSatuan') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>

                        {{-- Kodebarang2 --}}
                             <div class="form-group row">

                         <div class="col-md-6">
                            <input id="KodeBarang2" type="hidden" readonly class="form-control{{ $errors->has('KodeBarang2') ? ' is-invalid' : '' }}" name="KodeBarang2" value="{{ old('KodeBarang2') }}" required autofocus>

                            @if ($errors->has('KodeBarang2'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KodeBarang2') }}</strong>
                            </span>
                            @endif
                                </div>
                            </div>

                    <input class="btn btn-primary" onclick="tambahrow()" type="button" value="Add Barang">               

                </div>
            </div>
        </div>
    </div>

    {{-- tabel detail --}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                       <table id="example2" class="table  table-bordered">
                           <thead>
                               <tr>
                                <th>No</th>
                                <th>IDBarang</th>
                                <th>Kode_Barang</th>
                                <th>Nama_Barang</th>
                                <th>Qty</th>
                                <th>IDSatuan</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
{{-- ================================== penutup tabel --}}
</div>

{{-- Tab Pembayaran --}}
<div class="tab-pane fade" id="DetailPembayaran" role="tabpanel" aria-labelledby="DetailPembayaran-tab">
    {{-- Inputan Pembayaran --}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">

                        {{-- Akun Pembayaran --}}
                        <div class="form-group row">
                            <label for="NamaAkunPembayaran" class="col-md-4 col-form-label text-md-right">Nama Akun</label>

                            <div class="col-md-6">
                                <select name="NamaAkunPembayaran" class="form-control select2nih" id="NamaAkunPembayaran" ">
                                    <option value="">--Pilih--</option>
                                    @foreach ($AkunPembayaran as $item)
                                    <option value="{{ $item ->IDAkunPembayaran."|".$item ->Nama_Akun}}">{{ $item ->Nama_Akun }}</option>   
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('NamaAkunPembayaran'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('NamaAkunPembayaran') }}</strong>
                            </span>
                            @endif
                        </div>


                        {{-- Jenis Pembayaran --}}
                        <div class="form-group row">
                            <label for="Jenis_Pembayaran" class="col-md-4 col-form-label text-md-right">Jenis Pembayaran</label>
                            <div class="col-md-6">
                                <select name="Jenis_Pembayaran" id="Jenis_Pembayaran" class="form-control" >
                                    <option selected="" value="Tunai">Tunai</option>
                                    <option value="Transfer">Transfer</option>                                
                                    <option value="Giro">Giro</option>
                                </select>
                            </div>   
                        </div>

                        {{-- No Giro --}}
                        <div class="form-group row">
                            <label for="No_Giro" class="col-md-4 col-form-label text-md-right">No_Giro</label>

                            <div class="col-md-6">
                                <input id="No_Giro" type="text" readonly="" class="form-control{{ $errors->has('No_Giro') ? ' is-invalid' : '' }}" name="No_Giro" value="{{ old('No_Giro') }}" required autofocus>

                                @if ($errors->has('No_Giro'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('No_Giro') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        {{-- Tanggal Cair --}}
                        <div class="form-group row">
                            <label for="Tanggal_Cair" class="col-md-4 col-form-label text-md-right ">Tanggal_Cair</label>

                            <div class="col-md-6">
                                <input id="Tanggal_Cair"  type="date" class="form-control{{ $errors->has('Tanggal_Cair') ? ' is-invalid' : '' }}" name="Tanggal_Cair" value="{{ old('Tanggal_Cair') }}" required>

                                @if ($errors->has('Tanggal_Cair'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Tanggal_Cair') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- Pembayaran --}}
                        <div class="form-group row">
                            <label for="Pembayaran" class="col-md-4 col-form-label text-md-right">Pembayaran</label>

                            <div class="col-md-6">
                                <input id="Pembayaran" type="number"  class="form-control{{ $errors->has('Pembayaran') ? ' is-invalid' : '' }}" name="Pembayaran" value="{{ old('Subtotal') }}" required autofocus>

                                @if ($errors->has('Pembayaran'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Pembayaran') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    {{-- Hidden IDAkunPembayaran --}}
                    <div class="form-group row">

                         <div class="col-md-6">
                            <input id="IDAkunPembayaran" type="hidden" readonly class="form-control{{ $errors->has('IDAkunPembayaran') ? ' is-invalid' : '' }}" name="IDAkunPembayaran" value="{{ old('IDAkunPembayaran') }}" required autofocus>

                            @if ($errors->has('IDAkunPembayaran'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('IDAkunPembayaran') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    {{-- Hidden Kode Barang --}}
                    <div class="form-group row">
                    

                         <div class="col-md-6">
                            <input id="Nama_Akun" type="hidden" readonly class="form-control{{ $errors->has('Nama_Akun') ? ' is-invalid' : '' }}" name="Nama_Akun" value="{{ old('Nama_Akun') }}" required autofocus>

                            @if ($errors->has('Nama_Akun'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('Nama_Akun') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <input class="btn btn-primary" onclick="tambahrowpembayaran()" type="button" value="Add Pembayaran">               

                 </div>
            </div>
        </div>
    </div>

{{-- tabel Pembayaran --}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                         <table id="example1" class="table  table-bordered">
                             <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>IDAkunPembayaran</th>
                                    <th>Nama Akun</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>No Giro</th>
                                    <th>Tanggal Cair</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
{{-- ======= penutup tab pembayaran --}}

{{-- Footer form Penjualan --}}
<div class="row">

    <div class="box-body">

        <div class="col-md-6">
            {{-- Total --}}
            <div class="form-group row">
                <label for="Total" class="col-md-4 col-form-label text-md-right">Total</label>

                <div class="col-md-6">
                    <input id="Total" type="text" readonly="" class="form-control{{ $errors->has('Total') ? ' is-invalid' : '' }}" name="Total" value="{{ old('Total') }}" required autofocus>

                    @if ($errors->has('Total'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Total') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            {{-- Total Diskon --}}
            <div class="form-group row">
                <label for="Total_Diskon" class="col-md-4 col-form-label text-md-right">Total_Diskon</label>

                <div class="col-md-6">
                    <input id="Total_Diskon" type="text" readonly="" class="form-control{{ $errors->has('Total_Diskon') ? ' is-invalid' : '' }}" name="Total_Diskon" value="{{ old('Total_Diskon') }}" required autofocus>

                    @if ($errors->has('Total_Diskon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Total_Diskon') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            {{-- Total Ppn --}}
            <div class="form-group row">
                <label for="Total_Ppn" class="col-md-4 col-form-label text-md-right">Total_Ppn</label>

                <div class="col-md-6">
                    <input id="Total_Ppn" type="text" readonly="" class="form-control{{ $errors->has('Total_Ppn') ? ' is-invalid' : '' }}" name="Total_Ppn" value="{{ old('Total_Ppn') }}" required autofocus>

                    @if ($errors->has('Total_Ppn'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Total_Ppn') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            {{-- Grandtotal --}}
            <div class="form-group row">
                <label for="Grandtotal" class="col-md-4 col-form-label text-md-right">Grandtotal</label>
                <div class="col-md-6">
                    <input id="Grandtotal" type="text" readonly="" class="form-control{{ $errors->has('Grandtotal') ? ' is-invalid' : '' }}" name="Grandtotal" value="{{ old('Grandtotal') }}" required autofocus>

                    @if ($errors->has('Grandtotal'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Grandtotal') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>


        <div class="col-md-6">

            {{-- Pembayaran --}}
            <div class="form-group row">
                <label for="Pembayaran" class="col-md-4 col-form-label text-md-right">Pembayaran</label>
                <div class="col-md-6">
                    <input id="Pembayaran" type="text" readonly="" class="form-control{{ $errors->has('Pembayaran') ? ' is-invalid' : '' }}" name="Pembayaran" value="{{ old('Pembayaran') }}" required autofocus>

                    @if ($errors->has('Pembayaran'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Pembayaran') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            {{-- Sisa --}}
            <div class="form-group row">
                <label for="Sisa" class="col-md-4 col-form-label text-md-right">Sisa</label>
                <div class="col-md-6">
                    <input id="Sisa" type="text" readonly="" class="form-control{{ $errors->has('Sisa') ? ' is-invalid' : '' }}" name="Sisa" value="{{ old('Sisa') }}" required autofocus>

                    @if ($errors->has('Sisa'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Sisa') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
{{-- ===============penutup footer --}}

{{-- Simpan Data --}}
<div class="box-body">

    <span style="float: right;">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
             <input class="btn btn-primary" type="submit" value="Simpan Data">
         </div>
     </div>
 </span>

</div>
{{-- ================ --}}

</form>
</div>
</div>
</div>
</div>

</section>

@section('scriptbarang')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>



{{-- datatable --}}
<script>
  $(function () {
    $('#example1').DataTable(
        {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,

      "columnDefs": [
      {
        "targets": [ ],
        "visible": false,
        "searchable": false
    },
    ]

})

    $('#example2').DataTable(

    {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,

      "columnDefs": [
      {
        "targets": [1 ],
        "visible": false,
        "searchable": false
    },
    ]
    
});

// split val kode barang dan insert ke textbox lain
$("#Kode_Barang").change(function() {
    var str = $("#Kode_Barang").val();
    var res = str.split("|");
    $("#IDBarang").val(res[0]);
    $("#KodeBarang2").val(res[1]);
    $("#Nama_Barang").val(res[2]);
    $("#Satuan").val(res[3]);
    $("#Harga").val(res[4]);
    $("#IDSatuan").val(res[5]);

    // alert(str);

});



// split val nama Customer dan insert ke textbox lain
$("#Nama_Customer").change(function() {
    var str = $("#Nama_Customer").val();
    var res = str.split("|");
    $("#IDCustomer").val(res[0]);

        // alert("#Nama_Customer");

    });

// split val nama akun pembayaran dan insert ke textbox lain
$("#NamaAkunPembayaran").change(function() {
    var str = $("#NamaAkunPembayaran").val();
    var res = str.split("|");
    $("#IDAkunPembayaran").val(res[0]);

    });


$("#Gudang").change(function() {
    var str = $("#Gudang").val();
    var res = str.split("|");
    $("#IDGudang").val(res[0]);

        // alert("#Nama_Customer");

    });


});





  function hitung_subtotal(){
    var qty = $("#Qty").val();
    var harga = $("#Harga").val();
    var diskon = $("#Diskon").val();
    $("#Nilai_Diskon").val(harga*(diskon*0.01));
    var nilai_diskon = $("#Nilai_Diskon").val();
    $("#Subtotal").val(qty*(harga-nilai_diskon));
        // alert("test ddaaaa")
    }

    


//     function totalFrom() {
//     var table = document.getElementById('transferFundsForm:fundsFromTable');
//     var total = 0;

//     for (var i = 0; i < table.rows.length; i++) {
//         var secondColumn = table.rows[i].cells[1];
//         var input = secondColumn.getElementsByTagName('input')[0];
//         var value = parseInt(input.value);

//         if (!isNaN(value)) {
//             total += value;
//         }
//     }

//     document.getElementById('transferFundsForm:totalFrom').value = total;
// }

var counter = 1;

function tambahrow(){

    var gaga = $('#example2').DataTable();
    gaga.row.add( [
        counter,
        '<input type="text" style="border:none; width: 20px;" name="IDBarang[]" value="'+$("#IDBarang").val()+'">',
        '<input type="text" style="border:none; width: 50px;" name="KodeBarang2[]" value="'+$("#KodeBarang2").val()+'">',
        '<input type="text" style="border:none; width: 100px;" name="Nama_Barang[]" value="'+$("#Nama_Barang").val()+'">',
        '<input type="text" style="border:none; width: 30px;" name="Qty[]" value="'+$("#Qty").val()+'">',
        '<input type="text" style="border:none; width: 20px;" name="IDSatuan[]" value="'+$("#IDSatuan").val()+'">',
        '<input type="text" style="border:none; width: 60px;" name="Satuan[]" value="'+$("#Satuan").val()+'">',
        '<input type="text" style="border:none; width: 60px;" name="Harga[]" value="'+$("#Harga").val()+'">',
        '<input type="text" style="border:none; width: 40px;" name="Diskon[]" value="'+$("#Diskon").val()+'">',
        '<input type="text" style="border:none; width: 60px;" name="Nilai_Diskon[]" value="'+$("#Nilai_Diskon").val()+'">',
        '<input type="text" style="border:none; width: 100px;" name="Subtotal[]" value="'+$("#Subtotal").val()+'">',
        '<a href="#">hapus </a>'

        ] ).draw( false );

    counter++;

    $("#IDBarang").val('');
    $("#PilihBarang").prop("selected");
    $("#KodeBarang2").val('');
    $("#Nama_Barang").val('');
    $("#Qty").val('');
    $("#IDSatuan").val('');
    $("#Satuan").val('');
    $("#Harga").val('');
    $("#Diskon").val('');
    $("#Nilai_Diskon").val('');
    $("#Subtotal").val('');

}

var counter2 = 1;

function tambahrowpembayaran(){

    var gaga2 = $('#example1').DataTable();
    gaga2.row.add( [
        counter2,
        '<input type="text" style="border:none; width: 30px;" name="IDAkunPembayaran[]" value="'+$("#IDAkunPembayaran").val()+'">',
        '<input type="text" style="border:none; width: 50px;" name="Nama_Akun[]" value="'+$("#Nama_Akun").val()+'">',
        '<input type="text" style="border:none; width: 30px;" name="Jenis_Pembayaran[]" value="'+$("#Jenis_Pembayaran").val()+'">',
        '<input type="text" style="border:none; width: 50px;" name="No_Giro[]" value="'+$("#No_Giro").val()+'">',
        '<input type="text" style="border:none; width: 30px;" name="Tanggal_Cair[]" value="'+$("#Tanggal_Cair").val()+'">',
        '<input type="text" style="border:none; width: 40px;" name="Pembayaran[]" value="'+$("#Pembayaran").val()+'">',
        '<a href="#">hapus </a>'

        ] ).draw( false );

    counter2++;

    $("#IDAkunPembayaran").val('');
    $("#NamaAkunPembayaran").prop("selected");
    $("#Nama_Akun").val('');
    $("#Jenis_Pembayaran").val('');
    $("#Tanggal_Cair").val('');
    $("#Pembayaran").val('');
}


</script>


@endsection
@endsection

