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
                        <h3 class="box-title">Transaksi Penjualan</h3> 
                        <span style="float: right;"><a href="{{ route('Penjualan.tambah') }}">tambah</a></span>
                    </div>
                    </div>

            <div class="box-body">
                <div class="table-responsive">
                 <table id="example1" class="table  table-bordered">
                     <thead>
                         <tr>
                            <th>No</th>
                             <th>Nomor</th>
                             <th>Tanggal</th>
                             <th>IDCustomer</th>
                             <th>Nama_Customer</th>
                             <th>Total</th>
                             <th>Total_Diskon</th>
                             <th>Jenis_Faktur</th>
                             <th>Total_Ppn</th>
                             <th>Grandtotal</th>
                             <th>Aksi</th>
                             <th>Status Transaksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php $no = 0;?>

                     @foreach ($Penjualan as $item)
                           <?php $no++ ;?>

                     <tr>
                        <td autowidth>{{ $no }}</td>
                         <td>{{ $item->Nomor }}</td>
                         <td>{{ $item->Tanggal }}</td> 
                         <td>{{ $item->IDCustomer }}</td> 
                         <td>{{ $item->Nama_Customer }}</td> 
                         <td>{{ $item->Total_Diskon }}</td> 
                         <td>{{ $item->Total }}</td> 
                         <td>{{ $item->Jenis_Faktur }}</td> 
                         <td>{{ $item->Total_Ppn }}</td> 
                         <td>{{ $item->Grandtotal }}</td> 
                         <td>{{ $item->Status_Transaksi }}</td>

                         <td>
                            <a href="{{ route('Penjualan.ubah',$item->IDPenjualan) }}">Ubah </a> | 
                             <a href="#" onclick="hapus({{ $item->IDPenjualan }})">Hapus</a>
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
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
{{-- expr --}}

<script>

function hapus(aja) {
    var txt;
    var r = confirm("Apakah anda yakin ?");
    if (r == true) {
        window.location = "/Penjualan/hapus/"+aja;
    } 
}
</script>

<script>
  $(function () {
    $('#example1').DataTable(
        {
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false,
                "searchable": false
            },
        ]
    }
        )

})
</script>

@endsection

@endsection
