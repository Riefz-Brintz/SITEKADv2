@extends('layouts.adminltev2')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

@endsection

{{-- <style type="text/css">
  .content-wrapper{
    height: 1200px;
  }
</style>
--}}
@section('content')

<div class="content-wrapper">
 

        <section class="content">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data TAD
                    <span style="float: right;">
                      <a href="{{ route('Tad.tambah') }}" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span><strong>Tambah Data TAD</strong></span>            
                      </a>
                    </h3>
                  </span>
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                  <table id="example" class="table table-bordered table-striped">
                   <thead>
                    <tr>
                      <th>No</th>
                      <th>Aksi</th>
                      <th>No EKTP</th>
                      <th>NIK TAD</th>
                      <th>Cabang</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Telp</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Status Kawin</th>
                      <th>Gol Darah</th>
                      <th>Warga Negara</th>
                      <th>Nama Ibu Kandung</th>
                      <th>Catatan</th>
                      <th>Email</th>
                      <th>NPWP</th>
                      {{-- <th>IDTad</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach ($Tad as $item)
                    <?php $no++ ;?>
                    <tr>
                      <td autowidth>{{ $no }}</td>
                      <td >
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('Tad.ubah',$item->IDTad) }}">Ubah</a>
                            <a class="dropdown-item" onclick="hapustad({{ $item->IDTad }})">Hapus</a>
                          </div>
                        </div>
                
                      </td>
                      <td>{{ $item->no_ektp }}</td>
                      <td>{{ $item->nik_tad }}</td> 
                      <td>{{ $item->idcabang }}</td> 
                      <td>{{ $item->nm_lengkaptad }}</td> 
                      <td>{{ $item->tmp_lahir }}</td> 
                      <td>{{ $item->tgl_lahir }}</td> 
                      <td>{{ $item->umur }}</td> 
                      <td>{{ $item->telp }}</td> 
                      <td>{{ $item->jenis_kel }}</td> 
                      <td>{{ $item->agama }}</td> 
                      <td>{{ $item->statusperkawinan }}</td> 
                      <td>{{ $item->warga_negara }}</td> 
                      <td>{{ $item->gol_darah }}</td> 
                      <td>{{ $item->nm_ibukandung }}</td> 
                      <td>{{ $item->catatan }}</td> 
                      <td>{{ $item->emailadd }}</td> 
                      <td>{{ $item->npwptad }}</td> 

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

    </div>

    @endsection

    @section('script')

    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>


    {{-- <script>

      $(document).ready(function(){

        // Data table for serverside

        $('#example').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax":{
           "url": "{{ url('TadList') }}",
           "dataType": "json",
           "type": "POST",
           "data":{ _token: "{{csrf_token()}}"}
         },
         "columns": [
          { "data": "id" },
          {"data": "action" },
          {"data": "no_ektp"},
          {"data": "nik_tad"},
          {"data": "idcabang"},
          {"data": "nm_lengkaptad"},
          {"data": "tmp_lahir"},
          {"data": "tgl_lahir"},
          {"data": "umur"},
          {"data": "telp"},
          {"data": "jenis_kel"},
          {"data": "agama"},
          {"data": "statusperkawinan"},
          {"data": "warga_negara"},
          {"data": "gol_darah"},
          {"data": "nm_ibukandung"},
          {"data": "catatan"},
          {"data": "emailadd"},
          {"data": "npwptad"},
          {"data": "gambar_ektp"},
          {"data": "IDTad"},
     
         ],
         aoColumnDefs: [
         {
           bSortable: false,
           aTargets: [ -1 ]
         }
         ]  
       });
      });
    </script> --}}


    <!-- page script -->
    <script>

      // $(function () {
      //   $("#example1").DataTable();
      //   $('#example2').DataTable({
      //     "paging": true,
      //     "lengthChange": false,
      //     "searching": false,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false,
      //   });
      // });

      $(document).ready(function() {
        var table = $('#example').DataTable( {
            // lengthChange: false,
            paging: true,
            // autoWidth: true,
            scrollX: false,
            info: true,
            // scrollY:        '100vh',
            scrollCollapse: true,
            responsive: true,
            buttons: [ 'excel' ]
          } );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      } );


      function hapustad(aja) {
        var txt;
        var r = confirm("Apakah anda yakin ?");
        if (r == true) {
          window.location = "/Tad/hapus/"+aja;
        }
      }

    </script>
    @endsection
