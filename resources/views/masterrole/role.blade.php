@extends('layouts.adminlte')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

@endsection

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">


            @if (session('status'))
            <div class="alert alert-success" role="alert">
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
                  <h3 class="card-title">Data Role
                @if (session('tambah')=="Ya")
                   
                   <span style="float: right;">
                    <a href="{{ route('Role.tambah') }}" class="btn btn-primary btn-sm a-btn-slide-text">
                      <i class="fas fa-plus mr-2"></i>
                      <span><strong>Tambah Data Role</strong></span>            
                    </a>
                  </h3>
                </span>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="example2" class="table table-admin">
                  <thead>
                    <tr>
                     <th>No</th>
                     <th width="100px">Aksi</th>
                     <th width="300px">Nama_Role</th>
                     <th width="800px">Keterangan</th>
                   </tr>
                 </thead>

                 <tfoot>
                  <tr>
                    {{-- <th><input></th>
                    <th></th>
                    <th><input></th>
                    <th><input></th> --}}
                  </tr>
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
  {{-- <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.js') }}"></script>  --}}

  <!-- page script -->
  <script>




    function hapusRole(aja) {

      Swal.fire({
        title: "Yakin Ingin Menghapus ?",
        text: "Data Akan Hilang Jika Dihapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

      }).then(function(isConfirm){
              if (isConfirm.value===true){
                window.location = "/Role/hapus/"+aja;
              }
            });
    }

  </script>

  {{-- <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script> --}}
  <script>
    $(function() {
      $('#example2').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        },
        ajax: '{{ route('tampil_data_role') }}',
        columns: [
         {
          "data": "idrole",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }},
        { data: 'action', name: 'action', orderable: false, searchable: false},
        { data: 'nama_role', name: 'nama_role' },
        { data: 'keterangan', name: 'keterangan' }
        ],

      });
      
    });

  </script>
  @endsection
