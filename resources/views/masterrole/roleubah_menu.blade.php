 {{-- Tabel roledetail--}}
 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshroledetail()" data-toggle="modal" data-target="#modal_roledetail"><i class="fas fa-plus mr-2"></i>Tambah Akses Menu</a>    
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
        <?php $no = 0;?>
        @foreach ($RoleDetail as $data)
        <?php $no++ ;?>
        <tr id="bariske{{ $data->idroledetail }}">
          <td >{{ $no }}</td>
          <td style="width:80px ; text-align: center;" nowrap>
            <a id="btnedit_roledetail" href="#" onclick="editroledetail({{ $data->idroledetail }})" data-toggle="modal" data-target="#modal_roledetail" title="Edit Data"><i class="fas fa-edit mr-2"></i></a>
            <a href="#" onclick="hapusbarisroledetail({{ $data->idroledetail }})" title="Hapus Data"> <i class="fas fa-trash mr-2"></i></a>
          </td>

          <td><input style="width:250px ;" class="input_table" id="nama_menu{{ $data->idroledetail }}" readonly type="text" name="nama_menu[]" value="{{ $data->getmenu->nama_menu }}"></td>
          <td><input style="width:100px ;" class="input_table" id="lihat{{ $data->idroledetail }}" readonly type="text" name="lihat[]" value="{{ $data->lihat }}"></td>
          <td><input style="width:100px ;" class="input_table" id="tambah{{ $data->idroledetail }}" readonly type="text" name="tambah[]" value="{{ $data->tambah }}"></td>
          <td><input style="width:100px ;" class="input_table" id="ubah{{ $data->idroledetail }}" readonly type="text" name="ubah[]" value="{{ $data->ubah }}"></td>
          <td><input style="width:100px ;" class="input_table" id="hapus{{ $data->idroledetail }}" readonly type="text" name="hapus[]" value="{{ $data->hapus }}"></td>
          <td ><input class="input_table" id="idmenu{{ $data->idroledetail }}" readonly type="text" name="idmenu[]" value="{{ $data->idmenu }}"></td>
          <td ><input class="input_table" id="idroledetail{{ $data->idroledetail }}" readonly type="text" name="idroledetail[]" value="{{ $data->idroledetail }}"></td>
        </tr>
        @endforeach
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
                  <option value="">--Pilih--</option>
                  @foreach ($Menu as $data)
                  <option   value="{{ $data->idmenu }}">{{ $data->nama_menu }}</option>   
                  @endforeach
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



