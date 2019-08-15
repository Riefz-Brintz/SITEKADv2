@extends('layouts.layoutadmin')

@section('content')

<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              
              <span style="float: center;"><h3 class="box-title">Ubah Master Supplier </h3></span>
          </div>
          <div class="box-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <form method="POST" action="{{ route('Supplier.ubah',$item->IDSupplier) }}">
                        @csrf

                        <div class="form-group row">
                        <label for="Kode_Supplier" class="col-md-4 col-form-label text-md-right">Kode_Supplier</label>

                            <div class="col-md-6">
                                <input id="Kode_Supplier" type="text" class="form-control{{ $errors->has('Kode_Supplier') ? ' is-invalid' : '' }}" name="Kode_Supplier" value="{{ $item->Kode_Supplier }}"required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Nama_Supplier" class="col-md-4 col-form-label text-md-right">Nama_Supplier</label>

                            <div class="col-md-6">
                                <input id="Nama_Supplier" type="text" class="form-control" name="Nama_Supplier" value="{{ $item->Nama_Supplier }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grup_Supplier" class="col-md-4 col-form-label text-md-right">Grup_Supplier</label>
                              <div class="col-md-6">
                            <select name="Grup_Supplier" id="Grup_Supplier" class="form-control">
                              {{--   @if ($item->Grup_Supplier=="Khusus")
                                    <option selected value="Khusus">Khusus</option>
                                    <option value="Umum">Umum</option>
                                @else
                                    <option value="Khusus">Khusus</option>
                                    <option selected value="Umum">Umum</option>
                                @endif --}}
                                    
                                    <option {{ $item->Grup_Supplier=="Khusus" ? "selected":"" }} value="Khusus">Khusus</option>
                                    <option {{ $item->Grup_Supplier=="Umum" ? "selected":"" }} value="Umum">Umum</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="Contact_Person" class="col-md-4 col-form-label text-md-right">Contact_Person</label>

                            <div class="col-md-6">
                                <input id="Contact_Person" type="text" class="form-control{{ $errors->has('Contact_Person') ? ' is-invalid' : '' }}" name="Contact_Person" value="{{ $item->Contact_Person }}" required>

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
                                <input id="Telp_Supplier" type="text" class="form-control{{ $errors->has('Telp_Supplier') ? ' is-invalid' : '' }}" name="Telp_Supplier" value="{{ $item->Telp_Supplier }}" required>

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
                                <input id="Alamat_Supplier" type="text" class="form-control{{ $errors->has('Alamat_Supplier') ? ' is-invalid' : '' }}" name="Alamat_Supplier" value={{ $item->Alamat_Supplier }}" required>

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
                                <input id="Jatuh_Tempo" type="Number" class="form-control{{ $errors->has('Jatuh_Tempo') ? ' is-invalid' : '' }}" name="Jatuh_Tempo" value={{ $item->Jatuh_Tempo }}" required>

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
</section>
@endsection
