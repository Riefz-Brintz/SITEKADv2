@extends('layouts.sbadmin')


<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
{{-- expr --}}


@section('content')


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
              <div class="col-lg-12">
                <h1 class="page-header">Master Data Barang</h1>
              </div>
              <ul class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li>Master Barang</li>
              </ul>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <form action="{{ route('Barang.export') }}" method="POST" class="form-horizontal">
                  {{ csrf_field() }}
                  <span style="float: left;">
                    <input type="submit" name="print" value="PRINT" class="btn btn btn-success a-btn-slide-text">
                    <input type="submit" name="excel" value="to EXCEL" class="btn btn btn-success a-btn-slide-text">
                    <input type="submit" name="pdf" value="to PDF" class="btn btn btn-success a-btn-slide-text">
                  </span>
                  <span style="float: right;">
                    <a href="{{ route('Barang.tambah') }}" class="btn btn-primary a-btn-slide-text">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      <span><strong>Tambah Data Barang</strong></span>            
                    </a>
                  </span>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                   <th>No</th>
                   <th>Kode_Barang</th>
                   <th>Nama_Barang</th>
                   <th>Satuan_Barang</th>
                   <th>Harga_Barang</th>
                   <th>Grup_Barang</th>
                   <th>Aksi</th>
                 </tr>
                </thead>
               <tbody>
                  <?php $no = 0;?>
                    @foreach ($Barang as $item)
                      <?php $no++ ;?>
                      <tr>
                       <td autowidth>{{ $no }}</td>
                       <td>{{ $item->Kode_Barang }}</td>
                       <td>{{ $item->Nama_Barang }}</td> 
                       <td>{{ $item->Satuan }}</td> 
                       <td>{{ $item->Harga_Barang }}</td> 
                       <td>{{ $item->Grup_Barang }}</td> 

                       <td>
                          <a href="{{ route('Barang.ubah',$item->IDBarang) }}"> edit</a> | 
                          <a href="#" onclick="hapus({{ $item->IDBarang }})">Hapus</a>
                        </td>
                      </tr>
                    @endforeach
                   
                     </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode_Barang</th>
                    <th>Nama_Barang</th>
                    <th>Satuan_Barang</th>
                    <th>Harga_Barang</th>
                    <th>Grup_Barang</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         <!-- /.box-body -->
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
      window.location = "/Barang/hapus/"+aja;
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
