 {{-- Tabel kk tad --}}

 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshkk()" data-toggle="modal" data-target="#modal_kk2"><i class="fas fa-plus mr-2"></i>Tambah Data kk</a>    
  </span>
  <div class="table-responsive table-sm">
    <table id="tabelkk" class="table table-bordered">
      <thead class="thead-dark">
        <tr >
          <th >No</th>
          <th>Aksi</th>
          <th>NIK KK</th>
          <th>No EKTP</th>
          <th>Nama Lengkap</th>
          <th>Hubungan Keluarga</th>
          <th>Tempat Lahir</th>
          <th>Tgl Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Gol Darah</th>
          <th>Telp</th>

          <th>idkktad</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;?>
        @foreach ($Tadkk as $data)
        <?php $no++ ;?>
        <tr id="bariskkke{{ $data->idkktad }}">
          <td >{{ $no }}</td>
          <td style="width:80px ; text-align: center;" nowrap>
            <a id="btnedit_kk" href="#" onclick="editkk({{ $data->idkktad }})" title="Edit Data" data-toggle="modal" data-target="#modal_kk2" ><i class="fas fa-edit mr-2"></i></a>
            <a href="#" onclick="hapusbariskk({{ $data->idkktad }})" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>
          </td>

          {{-- <td>{{ $data->nik_kk }}</td> --}}
          <td ><input style="width:150px ;" class="input_table" id="nik_kk{{ $data->idkktad }}" readonly type="text" name="nik_kk[]" value="{{ $data->nik_kk }}"></td>
          <td ><input style="width:150px ;" class="input_table" id="no_ektpkk{{ $data->idkktad }}" readonly type="text" name="no_ektpkk[]" value="{{ $data->no_ektpkk }}"></td>
          <td><input style="width:200px ;" class="input_table" id="nama_kk{{ $data->idkktad }}" readonly type="text" name="nama_kk[]" value="{{ $data->nama_kk }}"></td>
          <td><input style="width:100px ;" class="input_table" id="hub_keluarga{{ $data->idkktad }}" readonly type="text" name="hub_keluarga[]" value="{{ $data->hub_keluarga }}"></td>
          <td><input style="width:100px ;" class="input_table" id="tmp_lahirkk{{ $data->idkktad }}" readonly type="text" name="tmp_lahirkk[]" value="{{ $data->tmp_lahir_kk }}"></td>
          <td class="td_input"><input style="width:100px ;" class="input_table" id="tgl_lahirkk{{ $data->idkktad }}" readonly type="text" name="tgl_lahirkk[]" value="{{ $data->tgl_lahir_kk }}"></td>
          <td><input style="width:100px ;" class="input_table" id="jenkel_kk{{ $data->idkktad }}" readonly type="text" name="jenkel_kk[]" value="{{ $data->jenkel_kk }}"></td>
          <td><input style="width:80px ;" class="input_table" id="goldarah_kk{{ $data->idkktad }}" readonly type="text" name="goldarah_kk[]" value="{{ $data->goldarah_kk }}"></td>
          <td><input style="width:120px ;" class="input_table" id="telp_hpkk{{ $data->idkktad }}" readonly type="text" name="telp_hpkk[]" value="{{ $data->telp_hpkk }}"></td>
          <td ><input class="input_table" id="idkktad{{ $data->idkktad }}" readonly type="text" name="idkktad[]" value="{{ $data->idkktad }}"></td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>



<div class="modal fade" id="modal_kk2" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data kk</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- NO EKTP --}}
            <div class="form-group row">
              <label for="no_ektpkk" class="col-md-3 col-form-label text-md-left">No EKTP</label>

              <div class="col-md-9">
                <input id="no_ektpkk" type="text" class="form-control{{ $errors->has('no_ektpkk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('no_ektpkk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_ektpkk') }}</strong>
                </span>
                @endif
              </div>
            </div>


            {{-- NIK KK --}}
            <div class="form-group row">
              <label for="nik_kk" class="col-md-3 col-form-label text-md-left">NIK KK</label>

              <div class="col-md-9">
                <input id="nik_kk" type="text" class="form-control{{ $errors->has('nik_kk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('nik_kk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nik_kk') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Nama KK TAD --}}
            <div class="form-group row">
              <label for="nama_kk" class="col-md-3 col-form-label text-md-left">Nama Lengkap</label>

              <div class="col-md-9">
                <input id="nama_kk" type="text" class="form-control{{ $errors->has('nama_kk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('nama_kk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nama_kk') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- HUb Keluarga kk --}}
            <div class="form-group row">
              <label for="hub_keluarga" class="col-md-3 col-form-label text-md-left">Hub Keluarga</label>
              <div class="col-md-9">
                <select id="hub_keluarga" class="form-control" >
                  <option value="">--Pilih--</option>

                  <option value="Istri">Istri</option>
                  <option value="Anak 1">Anak 1</option>
                  <option value="Anak 2">Anak 2</option>
                  <option value="Anak 3">Anak 3</option>
                </select>
              </div>   
            </div>



            {{-- Tempat Lahir --}}
            <div class="form-group row">
              <label for="tmp_lahirkk" class="col-md-3 col-form-label text-md-left">Tempat Lahir</label>

              <div class="col-md-9">
                <input id="tmp_lahirkk" type="text" class="form-control{{ $errors->has('tmp_lahirkk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tmp_lahirkk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tmp_lahirkk') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Tgl Lahir --}}
            <div class="form-group row">
              <label for="tgl_lahirkk" class="col-md-3 col-form-label text-md-left">Tgl Lahir</label>

              <div class="col-md-9">
                <input id="tgl_lahirkk" type="date" class="form-control{{ $errors->has('tgl_lahirkk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tgl_lahirkk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tgl_lahirkk') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Jenis Kelamin kk --}}
            <div class="form-group row">
              <label for="selectjenkel_kk" class="col-md-3 col-form-label text-md-left">Jenis Kelamin</label>
              <div class="col-md-9">
                <select id="selectjenkel_kk" class="form-control" >
                  1<option value="">--Pilih--</option>

                  <option value="P">P</option>
                  <option value="L">L</option>
                </select>
              </div>   
            </div>

            {{-- Jenis GOl darah kk --}}
            <div class="form-group row">
              <label for="selectgoldarah_kk" class="col-md-3 col-form-label text-md-left">Golongan Darah</label>
              <div class="col-md-9">
                <select id="selectgoldarah_kk" class="form-control" >
                  <option value="">--Pilih--</option>

                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
              </div>   
            </div>


            {{-- Telp KK --}}
            <div class="form-group row">
              <label for="telp_hpkk" class="col-md-3 col-form-label text-md-left">Telp</label>

              <div class="col-md-9">
                <input id="telp_hpkk" type="text" class="form-control{{ $errors->has('telp_hpkk') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('telp_hpkk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('telp_hpkk') }}</strong>
                </span>
                @endif
              </div>
            </div>



            {{-- Hidden --}}
            <div class="form-group row">

              <input id="idkktadtampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahkkbtn" type="button" onclick="tambahrowkk()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updatekkbtn" type="button" onclick="updaterowkk()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



