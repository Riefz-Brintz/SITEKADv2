 {{-- Tabel roledetail--}}
 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambah" onclick="refreshroledetail()" data-toggle="modal" data-target="#modal_roledetail">Tambah Data Role Detail</a>    
  </span>
  <div class="table-responsive table-sm">
    <table id="tabelroledetail" class="table table-bordered">
      <thead class="thead-dark">
        <tr >
          <th>No</th>
          <th>Aksi</th>
          <th>Nama Menu</th>
          <th>Lihat</th>
          <th>Tambah</th>
          <th>Ubah</th>
          <th>Hapus</th>
          <th>idmenu</th>
          <th>idroledetail</th>
        </tr>
      </thead>
      <tbody>
   
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>

</div>


<div class="modal fade" id="modal_roledetail" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data Role Detail</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- menu--}}
            <div class="form-group row">
              <label for="idmenu" class="col-md-3 col-form-label text-md-left">Menu</label>

              <div class="col-md-9">
                <select class="form-control" id="selectmenu"  style="width: 100%">
                  {{-- @foreach ($Menu as $data)
                  <option   value="{{ $data->idmenu }}">{{ $data->nama_menu }}</option>   
                  @endforeach --}}
                </select>
              </div>
              @if ($errors->has('idmenu'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('idmenu') }}</strong>
              </span>
              @endif
            </div>

            {{--  Lihat --}}
            <div class="form-group row">
              <label for="lihat" class="col-md-3 col-form-label text-md-left">Akses Lihat Data</label>
              <div class="col-md-9">
                <select id="lihat" class="form-control" >

                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
            
                </select>
              </div>   
            </div>

              {{--  tambah --}}
            <div class="form-group row">
              <label for="tambah" class="col-md-3 col-form-label text-md-left">Akses Tambah Data</label>
              <div class="col-md-9">
                <select id="tambah" class="form-control" >

                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
            
                </select>
              </div>   
            </div>

              {{--  ubah --}}
            <div class="form-group row">
              <label for="ubah" class="col-md-3 col-form-label text-md-left">Akses Ubah Data</label>
              <div class="col-md-9">
                <select id="ubah" class="form-control" >

                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
            
                </select>
              </div>   
            </div>

              {{--  hapus --}}
            <div class="form-group row">
              <label for="hapus" class="col-md-3 col-form-label text-md-left">Akses Hapus Data</label>
              <div class="col-md-9">
                <select id="hapus" class="form-control" >

                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
            
                </select>
              </div>   
            </div>


            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idroledetailtampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahroledetailbtn" type="button" onclick="tambahrowroledetail()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updateroledetailbtn" type="button" onclick="updaterowroledetail()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



