@extends('layouts.adminlte')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

@endsection

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      @if (session('status'))
      <div class="alert alert-success" Jenisbq="alert">
        {{ session('status') }}
      </div>
      @endif

    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <form id="formJenisbq" method="POST" action="{{ route('Jenisbq.simpandata') }}" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Daftar Jenis BQ</strong>
                @if (session('tambah')=="Ya")
                <span style="float: right;">
                  <a href="#" data-toggle="modal" onclick="tambahdata()" data-target="#modal_jenisbq" title="Edit Data" class="btn btn-primary btn-sm a-btn-slide-text">
                    <span class="fas fa-plus mr-2" aria-hidden="true"></span>
                    <span><strong>Tambah Jenis BQ</strong></span>            
                  </a>
                </h3>
              </span>
              @endif

            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <table id="example" class="table ">
               <thead>
                <tr>
                 <th>No</th>
                 <th>Aksi</th>
                 <th width="1500px">Jenis BQ</th>

               </tr>
             </thead>
             <tfoot>
              <tr>

              </tr>

            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <div class="modal fade" id="modal_jenisbq" role="dialog" >
        <div class="modal-dialog modal-lg" style="width: 600px">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
              <h4 class="modal-title"><strong>Input Jenis BQ</strong></h4>
            </div>
            <div class="modal-body">
              @csrf
              <div class="row"> 
                <div class="col-12">

                  {{-- jenisbq  --}}
                  <div class="form-group row">
                    <label for="jenisbq" class="col-md-3 col-form-label text-md-left">Jenis BQ</label>

                    <div class="col-md-9">
                      <input id="jenisbq" type="text" name="jenisbq" class="form-control{{ $errors->has('jenisbq') ? ' is-invalid' : '' }}" value="">

                      @if ($errors->has('jenisbq'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jenisbq') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  {{-- Hidden --}}
                  <div class="form-group row">
                    <input id="idjenisbqtampung" type="hidden" readonly class="form-control" value="" >
                  </div>

                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="simpanbq" type="button" onclick="simpanJenisbq()" class="btn btn-primary" data-dismiss="modal">Simpan Data</button>
              <button id="updatebq" type="button" visible="false" class="btn btn-primary" hide="true" data-dismiss="modal">Update Data</button>
            </div>
          </div>
        </div>
      </div>
    </form>

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
  function tambahdata(){
   $('#simpanbq').show();
   $('#updatebq').hide();
   $("#jenisbq").val("");
   $("#idjenisbqtampung").val("");

 }

 function hapusJenisbq(aja) {
  Swal.fire({
    title: "Yakin Ingin Menghapus ?",
    text: "Data Akan Hilang Jika Dihapus",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Ya, Hapus',

  }).then(function(isConfirm){
    if (isConfirm.value===true){
      window.location = "/Jenisbq/hapus/"+aja;
    }
  });
}



  function simpanJenisbq() {
    Swal.fire({
      title: "Simpan Data ?",
      text: "Simpan Data Jenis BQ",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Ya, Simpan',

    }).then(function(isConfirm){
      if (isConfirm.value===true){
        $("#formJenisbq").submit();
      }
    });
  }

 function ubahdata(id){
     $('#simpanbq').hide();
     $('#updatebq').show();

      base_url = window.location.origin;
      $.ajax({
        url: base_url+"/Jenisbq/"+id+"/edit",
        success: function(data){
          var json = JSON.parse(data);
          $.each(json.jenisbq, function(i, item) {
            $("#jenisbq").val(item.jenisbq);
            $("#idjenisbqtampung").val(item.idjenisbq);

          });

        }
      });
    }




  function updateJenisbq() {


      Swal.fire({
      title: "Update Data ?",
      text: "Update Data Jenis BQ",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Ya, Update',

      }).then(function(isConfirm){
      if (isConfirm.value===true){
       
        var token = $('meta[name=csrf-token]').attr('content');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        alert(CSRF_TOKEN);
        $.ajax({
           type:'POST',
           url:"/Jenisbq/edit/"+idjenisbq,
           data:{ _token:CSRF_TOKEN , idjenisbq:idjenisbq, jenisbq:jenisbq},
           success:function(data){
            window.location = "/Jenisbq";
           }

        });
      }
    });
  }

  $(document).ready(function() {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#updatebq").click(function(){
      var jenisbq = $("input[id=jenisbq]").val();
      var idjenisbq = $("input[id=idjenisbqtampung]").val();
      $.ajax({
        /* the route pointing to the post function */
        url: '/Jenisbq/edit/'+idjenisbq,
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, idjenisbq:idjenisbq, jenisbq:jenisbq},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) { 
              alert(data.success);
        }
      }); 
    });
    

    $("#simpanJenisbq").click(function(e){
      var txt;
      var r = confirm("Simpan Perubahan Data ?");
      if (r == true) {
        $("#formJenisbq").submit();
      }else{
        e.preventDefault();
      } 
    });

   

  } );

</script>

<script>
  $(function() {
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      },
      ajax: '{{ route('tampil_data_Jenisbq') }}',
      columns: [
      {
        "data": "idjenisbq",
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: 'action', name: 'action', orderable: false, searchable: false},
        { data: 'jenisbq', name: 'jenisbq' },
        ],

      });

  });

</script>
@endsection
