@extends('layouts.startmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{-- 
                  <a href="{{ route('narasumber') }}"> <button>Narasumber</button></a>
                  <a href="{{ route('listartikel') }}"> <button>Artikel</button></a>

                  <a href="{{ route('divisi') }}"> <button>Divisi</button></a> --}}
                  <a href="{{ route('Barang') }}"> <button>Barang</button></a>
                  <a href="{{ route('Customer') }}"> <button>Customer</button></a>
                  <a href="{{ route('Supplier') }}"> <button>Supplier</button></a>
{{-- 
                  <a href="{{ route('jabatan') }}"> <button>Jabatan</button></a>
                  <a href="{{ route('settingperusahaan') }}"> <button>Setting Data Perusahaan</button></a>
                  <a href="{{ route('karyawan') }}"> <button>Karyawan</button></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
