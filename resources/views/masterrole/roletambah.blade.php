@extends('layouts.adminlte')


@section('css')
{{-- 
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.css') }}">
  <style type="text/css">
  .input_table{
    border: none;
    background: transparent;
}
</style>
@endsection


@section('content')


<div class="content-wrapper">

    <section class="content">
        <div class="content-header">

        </div>

        <div class="row">
            <div class="col-12">
                <form id="formRole" method="POST" action="{{ route('Role.simpandata') }}" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Tambah Data Role</b></h4>
                        </div>

                        @csrf
                        <div class="card-body">

                            {{-- Inputan Header --}}
                            <div class="row"> 

                                {{-- Start Pemisah kolom form 1  --}}
                                <div class="col-12">

                                    {{-- Nama Role --}}
                                    <div class="form-group row">
                                        <label for="nama_role" class="col-md-3 col-form-label-sm text-md-left">Nama Role</label>

                                        <div class="col-md-9">
                                            <input id="nama_role" type="text" class="form-control form-control-sm{{ $errors->has('nama_role') ? ' is-invalid' : '' }}" name="nama_role" value="" required autofocus>

                                            @if ($errors->has('Role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_role') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Keterangan --}}
                                    <div class="form-group row">
                                        <label for="keterangan" class="col-md-3 col-form-label-sm text-md-left">Keterangan</label>

                                        <div class="col-md-9">
                                            <input id="keterangan" type="text" class="form-control form-control-sm{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" value="" required autofocus>

                                            @if ($errors->has('keterangan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('keterangan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                {{-- End Pemisah kolom form 1 --}}
                            </div>
                            {{-- End Inputan Header Row form  --}}

                        </div>

                    </div>
                    <div class="card mb">
                        <div class="card text-center mb">
                            <div class="card-header px py">
                                <ul class="nav nav-pills card-header-pills mx" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-role-tab" data-toggle="pill" href="#pills-role" role="tab" aria-controls="pills-role" aria-selected="true">Detail Role</a>
                                    </li>
                                </ul>

                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-role" role="tabpanel" aria-labelledby="pills-role-tab">
                                    @include('masterRole.roletambah_menu')
                                </div>
                            </div>

                        </div>
                        <span style="float:" class="mt-3">
                            <div class="form-group row">
                                <div class="col-md-4"></div>    
                                <div class="col-md-4 ">
                                    <button  id="simpanRole" class="btn btn-block btn-primary">
                                        <i class="fas fa-save mr-2"></i>Simpan Data
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="col-md-3"></div>         --}}
                        </span>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection



@section('script')
{{-- 
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script> --}}
<script src="{{ asset('adminlte/plugins/select2/js/select2.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>

{{-- Script Form --}}
<script>
    $(document).ready(function() {

        $("#simpanRole").click(function(e){
            var txt;
            var r = confirm("Simpan Perubahan Data ?");
            if (r == true) {
                $("#formRole").submit();
            }else{
                e.preventDefault();
            } 
        });

            // $('#tableroledetail').DataTable();
            

        } );

    </script>

    {{-- Script Data role --}}
    <script>

        $(document).ready(function() {

            $('#tabelroledetail td:nth-child(8)').hide();
            $('#tabelroledetail th:nth-child(8)').hide();
            $('#tabelroledetail td:nth-child(9)').hide();
            $('#tabelroledetail th:nth-child(9)').hide();

            $('#selectmenu').select2();


        } );

        function setmenu(id){
            base_url = window.location.origin;
            idp = $("#idmenu"+id).val();
            idmenu = $("#idmenu"+id).val();
            // console.log(id);
            if (id=='0'){
                idp = idmenu;
            }

            $("#selectmenu").empty();
                // $("#selectmenu").append('<option>-- Pilih --</option>');
                $.ajax({
                    url: base_url+"/getMenu/"+idp,
                    success: function(data){
                        var json = JSON.parse(data);

                        $.each(json.menu, function(i, item) {

                            $("#selectmenu").append('<option value="'+item.idmenu+'">'+item.nama_menu+'</option>');

                            if (item.idmenu == idmenu){
                                $("#selectmenu option[value='" + item.idmenu +"']").attr("selected","selected");
                            }
                        });

                    }
                });
            }

            function refreshroledetail(){
                id = '0';
                $('#updateroledetailbtn').hide();
                $('#tambahroledetailbtn').show();
                $('#lihat').val('');
                $('#tambah').val('');
                $('#ubah').val('');
                $('#hapus').val('');

                setmenu(id);
            }

            function editroledetail(id){
                $('#updateroledetailbtn').show();
                $('#tambahroledetailbtn').hide();
                $('#lihat').val($('#lihat'+id).val());
                $('#tambah').val($('#tambah'+id).val());
                $('#ubah').val($('#ubah'+id).val());
                $('#hapus').val($('#hapus'+id).val());
                $('#idroledetailtampung').val(id);


                setmenu(id);
            }

            function updaterowroledetail(){
                id = $('#idroledetailtampung').val();
                $('#lihat'+id).val($('#lihat').val());
                $('#tambah'+id).val($('#tambah').val());
                $('#ubah'+id).val($('#ubah').val());
                $('#hapus'+id).val($('#hapus').val());

                $('#idmenu'+id).val($('#selectmenu option:selected').val());
                $('#nama_menu'+id).val($('#selectmenu option:selected').text());

            }

            function tambahrowroledetail(){
                var baris= $('#tabelroledetail tbody tr').length;
                var idbaris = baris+1;
            // console.log(idbaris);

            var markup = '<tr id="bariske'+idbaris+'">'+
            '<td>'+idbaris+'</td>'+
            '<td style="width:140px ; text-align: center;" nowrap>'+
            '<a id="btnedit_roledetail" href="#" onclick="editroledetail('+idbaris+')" data-toggle="modal" data-target="#modal_roledetail" title="Edit Data"><i class="fas fa-edit mr-2"></i></a>'+
            '<a href="#" onclick="hapusbarisroledetail('+idbaris+')" title="Hapus Data"> <i class="fas fa-trash mr-2"></i></a>'+
            '</td>'+

            '<td><input style="width:250px ;" class="input_table" id="nama_menu'+idbaris+'" readonly type="text" name="nama_menu[]" value="'+$('#selectmenu option:selected').text()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="lihat'+idbaris+'" readonly type="text" name="lihat[]" value="'+$('#lihat').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="tambah'+idbaris+'" readonly type="text" name="tambah[]" value="'+$('#tambah').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="ubah'+idbaris+'" readonly type="text" name="ubah[]" value="'+$('#ubah').val()+'"></td>'+
            '<td><input style="width:100px ;" class="input_table" id="hapus'+idbaris+'" readonly type="text" name="hapus[]" value="'+$('#hapus').val()+'"></td>'+
            '<td ><input class="input_table" id="idmenu'+idbaris+'" readonly type="text" name="idmenu[]" value="'+$('#selectmenu option:selected').val()+'"></td>'+
            '<td ><input class="input_table" id="idroledetail'+idbaris+'" readonly type="text" name="idroledetail[]" value=""></td>'+
            '</tr>';

            $('#tabelroledetail').append(markup);

            $('#tabelroledetail td:nth-child(8)').hide();
            $('#tabelroledetail th:nth-child(8)').hide();
            $('#tabelroledetail td:nth-child(9)').hide();
            $('#tabelroledetail th:nth-child(9)').hide();
        }

        function hapusbarisroledetail(id){
          Swal.fire({
            title: "Hapus Data ?",
            text: "Hapus Data Akses",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

            }).then(function(isConfirm){
              if (isConfirm.value===true){
                $("#bariske"+id).remove();
            }
        });
        }

    </script>

    @endsection




