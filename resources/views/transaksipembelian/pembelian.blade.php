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
                        <h3 class="box-title">Transaksi Pembelian</h3> 
                        <span style="float: right;"><a href="{{ route('Pembelian.tambah') }}">tambah</a></span>
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
                             <th>IDSupplier</th>
                             <th>Nama_Supplier</th>
                             <th>No_SJ_Supplier</th>
                             <th>Grandtotal</th>
                             <th>Status_Transaksi</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php $no = 0;?>

                     @foreach ($Pembelian as $item)
                           <?php $no++ ;?>

                     <tr>
                        <td autowidth>{{ $no }}</td>
                         <td>{{ $item->Nomor }}</td>
                         <td>{{ $item->Tanggal }}</td> 
                         <td>{{ $item->IDSupplier }}</td> 
                         <td>{{ $item->Nama_Supplier }}</td> 
                         <td>{{ $item->No_SJ_Supplier }}</td> 
                         <td>{{ $item->Grandtotal }}</td> 
                         <td>{{ $item->Status_Transaksi }}</td>
                         <td>
                            <a href="{{ route('Pembelian.ubah',$item->IDPembelian) }}">Ubah </a> | 
                             <a href="#" onclick="hapus({{ $item->IDPembelian }})">Hapus</a>
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
        window.location = "/Pembelian/hapus/"+aja;
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
