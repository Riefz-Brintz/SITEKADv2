@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="{{ route('jabatan') }}">Kembali</a><div class="card-header">Tambah jabatan </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('jabatan.simpandata') }}">
                        @csrf

                       
                        <div class="form-group row">
                        <label for="Jabatan" class="col-md-4 col-form-label text-md-right">jabatan</label>

                            <div class="col-md-6">
                                <input id="Jabatan" type="text" class="form-control{{ $errors->has('Jabatan') ? ' is-invalid' : '' }}" name="Jabatan" value="{{ old('Jabatan') }}" required autofocus>

                                @if ($errors->has('jabatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Tunjangan_jabatan" class="col-md-4 col-form-label text-md-right">Tunjangan_jabatan</label>

                            <div class="col-md-6">
                                <input id="Tunjangan_jabatan" type="text" class="form-control{{ $errors->has('Tunjangan_jabatan') ? ' is-invalid' : '' }}" name="Tunjangan_jabatan" value="{{ old('Tunjangan_jabatan') }}" required>

                                @if ($errors->has('Tunjangan_jabatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Tunjangan_jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Level" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">
                                <input id="Level" type="text" class="form-control{{ $errors->has('Level') ? ' is-invalid' : '' }}" name="Level" value="{{ old('Level') }}" required>

                                @if ($errors->has('Level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Level') }}</strong>
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
