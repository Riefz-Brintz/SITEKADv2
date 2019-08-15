@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="{{ route('home') }}">Kembali</a><div class="card-header">divisi <span style="float: right;"><a href="{{ route('divisi.tambah') }}">tambah</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <table id="ujang" class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Kode_divisi</th>
                             <th>Nama_divisi</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                     @foreach ($divisi as $item)
                     <tr>
                         <td>{{ $item->Kode_divisi }}</td>
                         <td>{{ $item->Nama_divisi }}</td> 
                         <td>
                            <a href="{{ route('divisi.ubah',$item->IDDivisi) }}"> 
                            <button type="button" class="btn btn-primary">edit</button></a> | 
                             <a href="#" onclick="hapus({{ $item->IDDivisi }})">Hapus</a>
                         </td>
                     </tr>
                     @endforeach
                     </tbody>

                 </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function hapus(aja) {
    var txt;
    var r = confirm("Apakah anda yakin ?");
    if (r == true) {
        window.location = "/divisi/hapus/"+aja;
    } 
}
</script>
@endsection
