 {{-- Tabel Alamat tad --}}
 


 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambahalamat" onclick="refreshalamat()" data-toggle="modal" data-target="#modal_alamat2">Tambah Data Alamat</a>    
  </span>
  <div class="table-responsive table-sm">
  <table id="tabelalamat" class="table table-bordered">
    <thead class="thead-dark">
      <tr >
        <th>No</th>
        <th>Aksi</th>
        <th>Status</th>
        <th>Alamat</th>
        <th>Provinsi</th>
        <th>Kota</th>
        <th>Kecamatan</th>
        <th>Desa/Kelurahan</th>
        <th>Rt</th>
        <th>RW</th>
        <th>Kode POS</th>
        <th>No HP</th>
        <th>idalamattad</th>
        <th>idprovinsi</th>
        <th>idkota</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach ($TadAlamat as $data)
      <?php $no++ ;?>
      <tr id="bariske{{ $data->idalamattad }}">
        <td >{{ $no }}</td>
        <td style="width:140px ; text-align: center;" nowrap >

          <a id="btnedit_alamat" href="#" onclick="editalamat({{ $data->idalamattad }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_alamat2" >Edit</a> | 
          <a href="#" onclick="hapusbarisalamat({{ $data->idalamattad }})" class="btn btn-sm btn-danger">Hapus</a>
        </td>

        {{-- <td>{{ $data->status_alamat }}</td> --}}

        <td ><input style="width:100px ;" class="input_table" id="status_alamat{{ $data->idalamattad }}" readonly type="text" name="status_alamat[]" value="{{ $data->status_alamat }}"></td>
        <td><input style="width:500px ;" class="input_table" id="alamattad{{ $data->idalamattad }}" readonly type="text" name="alamattad[]" value="{{ $data->alamattad }}"></td>
        <td><input style="width:200px ;" class="input_table" id="nm_provinsi{{ $data->idalamattad }}" readonly type="text" name="nm_provinsi[]" value="{{ $data->getprovinsi->nm_provinsi }}"></td>
        <td><input style="width:200px ;" class="input_table" id="nm_kota{{ $data->idalamattad }}" readonly type="text" name="nm_kota[]" value="{{ $data->getkota->nm_kota }}"></td>
        <td class="td_input"><input style="width:200px ;" class="input_table" id="kecamatantad{{ $data->idalamattad }}" readonly type="text" name="kecamatantad[]" value="{{ $data->kecamatantad }}"></td>
        <td><input style="width:200px ;" class="input_table" id="desakelurahantad{{ $data->idalamattad }}" readonly type="text" name="desakelurahantad[]" value="{{ $data->desakelurahantad }}"></td>
        <td><input style="width:100px ;" class="input_table" id="rt_tad{{ $data->idalamattad }}" readonly type="text" name="rt_tad[]" value="{{ $data->rt_tad }}"></td>
        <td><input style="width:100px ;" class="input_table" id="rw_tad{{ $data->idalamattad }}" readonly type="text" name="rw_tad[]" value="{{ $data->rw_tad }}"></td>
        <td><input style="width:100px ;" class="input_table" id="kodepos{{ $data->idalamattad }}" readonly type="text" name="kodepos[]" value="{{ $data->kodepos }}"></td>
        <td><input style="width:150px ;" class="input_table" id="no_hpphone{{ $data->idalamattad }}" readonly type="text" name="no_hpphone[]" value="{{ $data->no_hpphone }}"></td>
        <td ><input class="input_table" id="idalamattad{{ $data->idalamattad }}" readonly type="text" name="idalamattad[]" value="{{ $data->idalamattad }}"></td>
        <td ><input class="input_table" id="idprovinsi{{ $data->idalamattad }}" readonly type="text" name="idprovinsi[]" value="{{ $data->idprovinsi }}"></td>
        <td ><input class="input_table" id="idkota{{ $data->idalamattad }}" readonly type="text" name="idkota[]" value="{{ $data->idkota }}"></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="modal_alamat2" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data Alamat</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- NO EKTP --}}
            <div class="form-group row">
              <label for="no_ektp_alamat" class="col-md-3 col-form-label text-md-left">No EKTP</label>

              <div class="col-md-9">
                <input id="no_ektp_alamat" type="text" readonly="true" class="form-control{{ $errors->has('no_ektp') ? ' is-invalid' : '' }}" value="{{ $item->no_ektp }}">

                @if ($errors->has('no_ektp_alamat'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_ektp_alamat') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- alamat TAD --}}
            <div class="form-group row">
              <label for="alamattad" class="col-md-3 col-form-label text-md-left">Alamat Tad</label>

              <div class="col-md-9">
                <input id="alamattad" type="text" class="form-control{{ $errors->has('alamattad') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('alamattad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('alamattad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Status alamat --}}
            <div class="form-group row">
              <label for="status_alamat" class="col-md-3 col-form-label text-md-left">Status alamat</label>
              <div class="col-md-9">
                <select id="status_alamat" class="form-control" >
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>                                
                </select>
              </div>   
            </div>

            {{-- Provinsi--}}
            <div class="form-group row">
              <label for="idprovinsi" class="col-md-3 col-form-label text-md-left">Provinsi</label>

              <div class="col-md-9">
                <select class="form-control" id="selectprovinsi"  style="width: 100%">
                  <option value="">--Pilih--</option>
                  @foreach ($Provinsi as $data)
                  <option   value="{{ $data->idprovinsi }}">{{ $data->nm_provinsi }}</option>   
                  @endforeach
                </select>
              </div>
              @if ($errors->has('idprovinsi'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('idprovinsi') }}</strong>
              </span>
              @endif
            </div>

            {{-- Kota--}}
            <div class="form-group row">
              <label for="idkota" class="col-md-3 col-form-label text-md-left">Kota</label>

              <div class="col-md-9">
                <select class="form-control" id="selectkota" style="width: 100%">
                  <option value="">--Pilih--</option>

                </select>
              </div>
              @if ($errors->has('idkota'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('idkota') }}</strong>
              </span>
              @endif
            </div>

            {{-- Kecamatan --}}
            <div class="form-group row">
              <label for="kecamatantad" class="col-md-3 col-form-label text-md-left">Kecamatan</label>

              <div class="col-md-9">
                <input id="kecamatantad" type="text" class="form-control{{ $errors->has('kecamatantad') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('kecamatantad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('kecamatantad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Desa --}}
            <div class="form-group row">
              <label for="desakelurahantad" class="col-md-3 col-form-label text-md-left">Desa/Kelurahan</label>

              <div class="col-md-9">
                <input id="desakelurahantad" type="text" class="form-control{{ $errors->has('desakelurahantad') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('desakelurahantad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('desakelurahantad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- RT --}}
            <div class="form-group row">
              <label for="rt_tad" class="col-md-3 col-form-label text-md-left">RT</label>

              <div class="col-md-9">
                <input id="rt_tad" type="text" class="form-control{{ $errors->has('rt_tad') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('rt_tad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('rt_tad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- RW --}}
            <div class="form-group row">
              <label for="rw_tad" class="col-md-3 col-form-label text-md-left">RW</label>

              <div class="col-md-9">
                <input id="rw_tad" type="text" class="form-control{{ $errors->has('rw_tad') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('rw_tad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('rw_tad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Kode POs --}}
            <div class="form-group row">
              <label for="kodepos" class="col-md-3 col-form-label text-md-left">Kode POS</label>

              <div class="col-md-9">
                <input id="kodepos" type="text" class="form-control{{ $errors->has('kodepos') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('kodepos'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('kodepos') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- No HP --}}
            <div class="form-group row">
              <label for="no_hpphone" class="col-md-3 col-form-label text-md-left">No Telp / Hp</label>

              <div class="col-md-9">
                <input id="no_hpphone" type="text" class="form-control{{ $errors->has('no_hpphone') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('no_hpphone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_hpphone') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
           
              <input id="idalamattadtampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahalamatbtn" type="button" onclick="tambahrowalamat()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updatealamatbtn" type="button" onclick="updaterowalamat()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



