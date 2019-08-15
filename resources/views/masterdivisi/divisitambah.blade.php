@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="{{ route('divisi') }}">Kembali</a><div class="card-header">Tambah divisi </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('divisi.simpandata') }}">
                        @csrf

                       
                        <div class="form-group row">
                        <label for="Kode_divisi" class="col-md-4 col-form-label text-md-right">Kode_divisi</label>

                            <div class="col-md-6">
                                <input id="Kode_divisi" type="text" class="form-control{{ $errors->has('Kode_divisi') ? ' is-invalid' : '' }}" name="Kode_divisi" value="{{ old('Kode_divisi') }}" required autofocus>

                                @if ($errors->has('Kode_divisi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Kode_divisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Nama_divisi" class="col-md-4 col-form-label text-md-right">Nama_divisi</label>

                            <div class="col-md-6">
                                <input id="Nama_divisi" type="text" class="form-control{{ $errors->has('Nama_divisi') ? ' is-invalid' : '' }}" name="Nama_divisi" value="{{ old('Nama_divisi') }}" required>

                                @if ($errors->has('Nama_divisi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nama_divisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Data
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
