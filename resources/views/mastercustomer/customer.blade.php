@extends('layouts.startmin')


<link rel="stylesheet" href="{{ asset('startmin\css\dataTables\dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('startmin\css\dataTables\dataTables.responsive.css') }}">

{{-- <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> --}}

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
                        <h3 class="box-title">Master Data Customer</h3> 
                        <span style="float: right;"><a href="{{ route('Customer.tambah') }}">tambah</a></span>
                    </div>
                    </div>

            <div class="box-body">
                <div class="table-responsive">
                 <table id="example1" class="table  table-bordered">
                     <thead>
                         <tr>
                            <th>No</th>
                             <th>Kode_Customer</th>
                             <th>Nama_Customer</th>
                             <th>Grup_Customer</th>
                             <th>Contact_Person</th>
                             <th>Alamat_Customer</th>
                             <th>Telp_Customer</th>
                             <th>Jatuh_Tempo</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php $no = 0;?>

                     @foreach ($Customer as $item)
                           <?php $no++ ;?>

                     <tr>
                        <td autowidth>{{ $no }}</td>
                         <td>{{ $item->Kode_Customer }}</td>
                         <td>{{ $item->Nama_Customer }}</td> 
                         <td>{{ $item->Grup_Customer }}</td> 
                         <td>{{ $item->Contact_Person }}</td> 
                         <td>{{ $item->Telp_Customer }}</td> 
                         <td>{{ $item->Alamat_Customer }}</td> 
                         <td>{{ $item->Jatuh_Tempo }}</td> 

                         <td>
                            <a href="{{ route('Customer.ubah',$item->IDCustomer) }}">Ubah </a> | 
                             <a href="#" onclick="hapus({{ $item->IDCustomer }})">Hapus</a>
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
</div>
</section>




@section('scriptbarang')
    <script src="{{ asset('startmin\js\dataTables\jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('startmin\js\dataTables\dataTables.bootstrap.min.js') }}"></script>
{{-- expr --}}
{{-- 
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script> --}}
<script>

function hapus(aja) {
    var txt;
    var r = confirm("Apakah anda yakin ?");
    if (r == true) {
        window.location = "/Customer/hapus/"+aja;
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
