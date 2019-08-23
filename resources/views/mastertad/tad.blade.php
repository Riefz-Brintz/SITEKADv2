@extends('layouts.adminlte')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
 <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"> --}}

@endsection

{{-- <style type="text/css">
  .content-wrapper{
    height: 1200px;
  }
</style>
--}}
@section('content')

<div class="content-wrapper">
 <div class="content-header">
  <div class="container-fluid">


    @if (session('status'))
    <div class="alert alert-success" User="alert">
      {{ session('status') }}
    </div>
    @endif

  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="row">
    <div class="col-12">
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data TAD
            <span style="float: right;">
              <a href="{{ route('Tad.tambah') }}" class="btn btn-primary a-btn-slide-text">
                <i class="fas fa-plus mr-2"></i>
                <span><strong>Tambah Data TAD</strong></span>            
              </a>
            </h3>
          </span>
        </div>
        <!-- /.card-header -->
        <div class="card-body" >
          <table id="example" class="table ">
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
            
          </tbody>
          <tfoot>
            
          </tfoot>
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


    
    <script>

      $(document).ready(function() {
         $('#example').css('min-height','2000');
      } );


      function hapustad(aja) {
        var txt;
        var r = confirm("Apakah anda yakin ?");
        if (r == true) {
          window.location = "/Tad/hapus/"+aja;
        }
      }

    </script>

    <script>
    $(function() {
      $('#example').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // scrollX:"300px",
        // responsive:true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        },
        ajax: '{{ route('tampil_data_tad') }}',
        columns: [
         {
          "data": "IDTad",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }},
        { data: 'action', name: 'action', orderable: false, searchable: false},
        { data: 'no_ektp', name: 'no_ektp' },
        { data: 'nik_tad', name: 'nik_tad' },
        { data: 'cabang', name: 'cabang' },
        { data: 'nm_lengkaptad', name: 'nm_lengkaptad' },
        { data: 'tmp_lahir', name: 'tmp_lahir' },
        { data: 'tgl_lahir', name: 'tgl_lahir' },
        { data: 'umur', name: 'umur' },
        { data: 'telp', name: 'telp' },
        { data: 'jenis_kel', name: 'jenis_kel' },
        { data: 'agama', name: 'agama' },
        { data: 'statusperkawinan', name: 'statusperkawinan' },
        { data: 'warga_negara', name: 'warga_negara' },
        { data: 'gol_darah', name: 'gol_darah' },
        { data: 'nm_ibukandung', name: 'nm_ibukandung' },
        { data: 'catatan', name: 'catatan' },
        { data: 'emailadd', name: 'emailadd' },
        { data: 'npwptad', name: 'npwptad' }
        ],

      });
      
    });

  </script>
    @endsection
