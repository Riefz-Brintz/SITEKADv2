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
                  <h3 class="card-title">Data User
                    <span style="float: right;">
                      <a href="{{ route('User.tambah') }}" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span><strong>Tambah Data User</strong></span>            
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
                     <th>Nama User</th>
                     <th>Email</th>
                     <th>Cabang</th>
                     <th>Role</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach ($User as $item)
                    <?php $no++ ;?>
                    <tr>
                      <td autowidth>{{ $no }}</td>
                      <td >
                        <div class="btn-group">
                          <button type="button" class="btn btn-info btn-flat">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" User="menu">
                            <a class="dropdown-item" href="{{ route('User.ubah',$item->id) }}">Ubah</a>
                            <a class="dropdown-item" onclick="hapusUser({{ $item->id }})">Hapus</a>
                          </div>
                        </div>
                
                      </td>
                      <td width="200px">{{ $item->name }}</td>                     
                      <td width="300px">{{ $item->email }}</td>                     
                      <td width="300px">{{ $item->getcabang->cabang }}</td>                     
                      <td width="200px">{{ $item->getrole->nama_role }}</td>

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

    <!-- page script -->
    <script>

      $(document).ready(function() {
        $('#example').DataTable();
      } );


      function hapusUser(aja) {
        var txt;
        var r = confirm("Apakah anda yakin ?");
        if (r == true) {
          window.location = "/User/hapus/"+aja;
        }
      }

    </script>z
    @endsection
