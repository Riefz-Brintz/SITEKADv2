@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="{{ route('home') }}">Kembali</a><div class="card-header">jabatan <span style="float: right;"><a href="{{ route('jabatan.tambah') }}">tambah</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <table id="ujang" class="table table-bordered">
                     <thead>
                         <tr>
                             <th>jabatan</th>
                             <th>Tunjangan_jabatan</th>
                             <th>Level</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                     @foreach ($jabatan as $item)
                     <tr>
                         <td>{{ $item->Jabatan }}</td>
                         <td>{{ $item->Tunjangan_jabatan }}</td> 
                          <td>{{ $item->Level }}</td> 
                         <td>
                            <a href="{{ route('jabatan.ubah',$item->IDJabatan) }}"> 
                            <button type="button" class="btn btn-primary">edit</button></a> | 
                             <a href="#" onclick="hapus({{ $item->IDJabatan }})">Hapus</a>
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
        window.location = "/jabatan/hapus/"+aja;
    } 
}
</script>
@endsection
