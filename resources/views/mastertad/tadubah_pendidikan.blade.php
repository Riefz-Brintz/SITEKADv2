 {{-- Tabel pendidikan tad --}}



 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambah" onclick="refreshpendidikan()" data-toggle="modal" data-target="#modal_pendidikan">Tambah Data Pendidikan</a>    
  </span>
  <div class="table-responsive table-sm">
    <table id="tabelpendidikan" class="table table-bordered">
      <thead class="thead-dark">
        <tr >
          <th >No</th>
          <th>Aksi</th>
          <th>Tingkat Sekolah</th>
          <th>Nama Sekolah</th>
          <th>Kota</th>
          <th>Jurusan</th>
          <th>Tahun Masuk</th>
          <th>Tahun Lulus</th>
          <th>Keterangan</th>
          <th>idpendidikan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;?>
        @foreach ($TadPendidikan as $data)
        <?php $no++ ;?>
        <tr id="bariske{{ $data->idpendidikan }}">
          <td >{{ $no }}</td>
          <td style="width:140px ; text-align: center;" nowrap>
            <a id="btnedit_pendidikan" href="#" onclick="editpendidikan({{ $data->idpendidikan }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_pendidikan" >Edit</a> | 
            <a href="#" onclick="hapusbarispendidikan({{ $data->idpendidikan }})" class="btn btn-sm btn-danger">Hapus</a>
          </td>

          <td><input style="width:100px ;" class="input_table" id="tingkatsekolah{{ $data->idpendidikan }}" readonly type="text" name="tingkatsekolah[]" value="{{ $data->tingkatsekolah }}"></td>
          <td><input style="width:250px ;" class="input_table" id="namasekolah{{ $data->idpendidikan }}" readonly type="text" name="namasekolah[]" value="{{ $data->namasekolah }}"></td>
          <td ><input style="width:200px ;" class="input_table" id="kota{{ $data->idpendidikan }}" readonly type="text" name="kota[]" value="{{ $data->kota }}"></td>
          <td><input style="width:200px ;" class="input_table" id="jurusan{{ $data->idpendidikan }}" readonly type="text" name="jurusan[]" value="{{ $data->jurusan }}"></td>
          <td><input style="width:150px ;" class="input_table" id="tahunmasuk{{ $data->idpendidikan }}" readonly type="text" name="tahunmasuk[]" value="{{ $data->tahunmasuk }}"></td>
          <td><input style="width:150px ;" class="input_table" id="tahunlulus{{ $data->idpendidikan }}" readonly type="text" name="tahunlulus[]" value="{{ $data->tahunlulus }}"></td>
          <td><input style="width:350px ;" class="input_table" id="keterangan{{ $data->idpendidikan }}" readonly type="text" name="keterangan[]" value="{{ $data->keterangan }}"></td>

          <td ><input class="input_table" id="idpendidikan{{ $data->idpendidikan }}" readonly type="text" name="idpendidikan[]" value="{{ $data->idpendidikan }}"></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>
</div>


<div class="modal fade" id="modal_pendidikan" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data Riwayat Kerja</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- tingkatsekolah  --}}
            <div class="form-group row">
              <label for="tingkatsekolah" class="col-md-3 col-form-label text-md-left">Tingkat Sekolah</label>

              <div class="col-md-9">
                <input id="tingkatsekolah" type="text" class="form-control{{ $errors->has('tingkatsekolah') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tingkatsekolah'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tingkatsekolah') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- namasekolah  --}}
            <div class="form-group row">
              <label for="namasekolah" class="col-md-3 col-form-label text-md-left">Nama Sekolah</label>

              <div class="col-md-9">
                <input id="namasekolah" type="text" class="form-control{{ $errors->has('namasekolah') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('namasekolah'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('namasekolah') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- kota  --}}
            <div class="form-group row">
              <label for="kota" class="col-md-3 col-form-label text-md-left">Kota</label>

              <div class="col-md-9">
                <input id="kota" type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('kota'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('kota') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- jurusan  --}}
            <div class="form-group row">
              <label for="jurusan" class="col-md-3 col-form-label text-md-left">Jurusan</label>

              <div class="col-md-9">
                <input id="jurusan" type="text" class="form-control{{ $errors->has('jurusan') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('jurusan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('jurusan') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- tahunmasuk  --}}
            <div class="form-group row">
              <label for="tahunmasuk" class="col-md-3 col-form-label text-md-left">Tahun Masuk</label>

              <div class="col-md-9">
                <input id="tahunmasuk" type="text" class="form-control{{ $errors->has('tahunmasuk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tahunmasuk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tahunmasuk') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- tahunlulus --}}
            <div class="form-group row">
              <label for="tahunlulus" class="col-md-3 col-form-label text-md-left">Tahun Lulus</label>

              <div class="col-md-9">
                <input id="tahunlulus" type="text" class="form-control{{ $errors->has('tahunlulus') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tahunlulus'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tahunlulus') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- keterangan  --}}
            <div class="form-group row">
              <label for="keterangan" class="col-md-3 col-form-label text-md-left">Keterangan</label>

              <div class="col-md-9">
                <input id="keterangan" type="text" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('keterangan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('keterangan') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idpendidikantampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahpendidikanbtn" type="button" onclick="tambahrowpendidikan()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updatependidikanbtn" type="button" onclick="updaterowpendidikan()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



