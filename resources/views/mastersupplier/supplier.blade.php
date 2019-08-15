@extends('layouts.layoutadmin')


<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
{{-- expr --}}


@section('content')

<section class="content-header">

</section>

<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="box">
                        <div class="box-header">
                        <h3 class="box-title">Master Data Supplier</h3> 
                        <span style="float: right;"><a href="{{ route('Supplier.tambah') }}">tambah</a></span>
                    </div>
                    </div>

            <div class="box-body">
                 <table id="example1" class="table  table-bordered">
                     <thead>
                         <tr>
                            <th>No</th>
                             <th>Kode_Supplier</th>
                             <th>Nama_Supplier</th>
                             <th>Grup_Supplier</th>
                             <th>Contact_Person</th>
                             <th>Alamat_Supplier</th>
                             <th>Telp_Supplier</th>
                             <th>Jatuh_Tempo</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php $no = 0;?>

                     @foreach ($Supplier as $item)
                           <?php $no++ ;?>

                     <tr>
                        <td autowidth>{{ $no }}</td>
                         <td>{{ $item->Kode_Supplier }}</td>
                         <td>{{ $item->Nama_Supplier }}</td> 
                         <td>{{ $item->Grup_Supplier }}</td> 
                         <td>{{ $item->Contact_Person }}</td> 
                         <td>{{ $item->Telp_Supplier }}</td> 
                         <td>{{ $item->Alamat_Supplier }}</td> 
                         <td>{{ $item->Jatuh_Tempo }}</td> 

                         <td>
                            <a href="{{ route('Supplier.ubah',$item->IDSupplier) }}">Ubah </a> | 
                             <a href="#" onclick="hapus({{ $item->IDSupplier }})">Hapus</a>
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
</section>




@section('scriptbarang')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
{{-- expr --}}

<script>

function hapus(aja) {
    var txt;
    var r = confirm("Apakah anda yakin ?");
    if (r == true) {
        window.location = "/Supplier/hapus/"+aja;
    } 
}
</script>

<script>
  $(function () {
    $('#example1').DataTable()

})
</script>

@endsection

@endsection
