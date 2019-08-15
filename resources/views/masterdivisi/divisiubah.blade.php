@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="{{ route('divisi') }}">Kembali</a><div class="card-header">Ubah divisi </div>

                <div class="card-body">
                 <form method="POST" action="{{ route('divisi.ubah',$item->IDDivisi) }}">
                        @csrf

                        <div class="form-group row">
                        <label for="Kode_divisi" class="col-md-4 col-form-label text-md-right">Kode_divisi</label>

                            <div class="col-md-6">
                                <input id="Kode_divisi" type="text" class="form-control{{ $errors->has('Kode_divisi') ? ' is-invalid' : '' }}" name="Kode_divisi" value="{{ $item->Kode_divisi }}"required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Nama_divisi" class="col-md-4 col-form-label text-md-right">Nama_divisi</label>

                            <div class="col-md-6">
                                <input id="Nama_divisi" type="text" class="form-control" name="Nama_divisi" value="{{ $item->Nama_divisi }}" required autofocus>
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
