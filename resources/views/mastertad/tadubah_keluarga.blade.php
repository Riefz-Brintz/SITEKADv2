 {{-- Tabel keluarga tad --}}


 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambah" onclick="refreshkeluarga()" data-toggle="modal" data-target="#modal_keluarga">Tambah Data keluarga</a>    
  </span>
<div class="table-responsive table-sm">
  <table id="tabelkeluarga" class="table table-bordered">
    <thead class="thead-dark">
      <tr >
        <th >No</th>
        <th>Aksi</th>
        <th>Nama Keluarga</th>
        <th>Hubungan</th>
        <th>Alamat</th>
        <th>Telp</th>

        <th>idkeluarga</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach ($TadKeluarga as $data)
      <?php $no++ ;?>
      <tr id="bariske{{ $data->idkeluarga }}">
        <td >{{ $no }}</td>
        <td style="width:140px ; text-align: center;" nowrap>
          <a id="btnedit_keluarga" href="#" onclick="editkeluarga({{ $data->idkeluarga }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_keluarga" >Edit</a> | 
          <a href="#" onclick="hapusbariskeluarga({{ $data->idkeluarga }})" class="btn btn-sm btn-danger">Hapus</a>
        </td>

        <td><input style="width:200px ;" class="input_table" id="nm_kel{{ $data->idkeluarga }}" readonly type="text" name="nm_kel[]" value="{{ $data->nm_kel }}"></td>
        <td><input style="width:150px ;" class="input_table" id="hub_kel{{ $data->idkeluarga }}" readonly type="text" name="hub_kel[]" value="{{ $data->hub_kel }}"></td>
        <td ><input style="width:350px ;" class="input_table" id="alamat_kel{{ $data->idkeluarga }}" readonly type="text" name="alamat_kel[]" value="{{ $data->alamat_kel }}"></td>
        <td ><input style="width:200px ;" class="input_table" id="telp_kel{{ $data->idkeluarga }}" readonly type="text" name="telp_kel[]" value="{{ $data->telp_kel }}"></td>

        <td ><input class="input_table" id="idkeluarga{{ $data->idkeluarga }}" readonly type="text" name="idkeluarga[]" value="{{ $data->idkeluarga }}"></td>
      </tr>
      @endforeach
    </tbody>
    
  </table>
</div>
</div>



<div class="modal fade" id="modal_keluarga" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data keluarga</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- nm_kel  --}}
            <div class="form-group row">
              <label for="nm_kel" class="col-md-3 col-form-label text-md-left">Nama Keluarga</label>

              <div class="col-md-9">
                <input id="nm_kel" type="text" class="form-control{{ $errors->has('nm_kel') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('nm_kel'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nm_kel') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- hub_kel  --}}
            <div class="form-group row">
              <label for="hub_kel" class="col-md-3 col-form-label text-md-left">Hubungan Keluarga</label>

              <div class="col-md-9">
                <input id="hub_kel" type="text" class="form-control{{ $errors->has('hub_kel') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('hub_kel'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('hub_kel') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Alamat  --}}
            <div class="form-group row">
              <label for="alamat_kel" class="col-md-3 col-form-label text-md-left">Alamat</label>

              <div class="col-md-9">
                <input id="alamat_kel" type="text" class="form-control{{ $errors->has('alamat_kel') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('alamat_kel'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('alamat_kel') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Telp  --}}
            <div class="form-group row">
              <label for="telp_kel" class="col-md-3 col-form-label text-md-left">Telp</label>

              <div class="col-md-9">
                <input id="telp_kel" type="text" class="form-control{{ $errors->has('telp_kel') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('telp_kel'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('telp_kel') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idkeluargatampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahkeluargabtn" type="button" onclick="tambahrowkeluarga()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updatekeluargabtn" type="button" onclick="updaterowkeluarga()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



