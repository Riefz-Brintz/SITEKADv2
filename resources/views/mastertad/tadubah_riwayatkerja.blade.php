 {{-- Tabel riwayatkerja tad --}}

 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshriwayatkerja()" data-toggle="modal" data-target="#modal_riwayatkerja"><i class="fas fa-plus mr-2"></i>Tambah Data riwayatkerja</a>    
  </span>
  <div class="table-responsive table-sm">
    <table id="tabelriwayatkerja" class="table table-bordered">
      <thead class="thead-dark">
        <tr >
          <th >No</th>
          <th>Aksi</th>
          <th>Nama Perusahaan</th>
          <th>Alamat</th>
          <th>Telp</th>
          <th>Bidang Usaha</th>
          <th>Jabatan Terakhir</th>
          <th>Status Pegawai</th>
          <th>Nama Atasan</th>
          <th>Jabatan Atasan</th>
          <th>Tgl Mulai Kerja</th>
          <th>Tgl Terakhir Kerja</th>
          <th>Alasan Berhenti</th>
          <th>Upah Terakhir</th>
          <th>idriwayatkerja</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;?>
        @foreach ($TadRiwayatKerja as $data)
        <?php $no++ ;?>
        <tr id="barisriwayatkerjake{{ $data->idriwayatkerja }}">
          <td >{{ $no }}</td>
          <td style="width:80px ; text-align: center;" nowrap>
            <a id="btnedit_riwayatkerja" href="#" onclick="editriwayatkerja({{ $data->idriwayatkerja }})" title="Edit Data" data-toggle="modal" data-target="#modal_riwayatkerja" ><i class="fas fa-edit mr-2"></i></a> 
            <a href="#" onclick="hapusbarisriwayatkerja({{ $data->idriwayatkerja }})" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>
          </td>

          {{-- <td>{{ $data->no_kpj }}</td> --}}

          <td><input style="width:250px ;" class="input_table" id="nm_corp{{ $data->idriwayatkerja }}" readonly type="text" name="nm_corp[]" value="{{ $data->nm_corp }}"></td>
          <td><input style="width:350px ;" class="input_table" id="almt_corp{{ $data->idriwayatkerja }}" readonly type="text" name="almt_corp[]" value="{{ $data->almt_corp }}"></td>
          <td ><input style="width:100px ;" class="input_table" id="telp_corp{{ $data->idriwayatkerja }}" readonly type="text" name="telp_corp[]" value="{{ $data->telp_corp }}"></td>
          <td><input style="width:200px ;" class="input_table" id="usaha_corp{{ $data->idriwayatkerja }}" readonly type="text" name="usaha_corp[]" value="{{ $data->usaha_corp }}"></td>
          <td><input style="width:150px ;" class="input_table" id="jabakhir_corp{{ $data->idriwayatkerja }}" readonly type="text" name="jabakhir_corp[]" value="{{ $data->jabakhir_corp }}"></td>
          <td><input style="width:100px ;" class="input_table" id="statuspeg_corp{{ $data->idriwayatkerja }}" readonly type="text" name="statuspeg_corp[]" value="{{ $data->statuspeg_corp }}"></td>
          <td><input style="width:100px ;" class="input_table" id="nmatasan_corp{{ $data->idriwayatkerja }}" readonly type="text" name="nmatasan_corp[]" value="{{ $data->nmatasan_corp }}"></td>
          <td><input style="width:150px ;" class="input_table" id="jbtatasan_corp{{ $data->idriwayatkerja }}" readonly type="text" name="jbtatasan_corp[]" value="{{ $data->jbtatasan_corp }}"></td>
          <td><input style="width:100px ;" class="input_table" id="tmtawal_corp{{ $data->idriwayatkerja }}" readonly type="text" name="tmtawal_corp[]" value="{{ $data->tmtawal_corp }}"></td>
          <td><input style="width:100px ;" class="input_table" id="tmtakhir_corp{{ $data->idriwayatkerja }}" readonly type="text" name="tmtakhir_corp[]" value="{{ $data->tmtakhir_corp }}"></td>
          <td><input style="width:300px ;" class="input_table" id="alasan{{ $data->idriwayatkerja }}" readonly type="text" name="alasan[]" value="{{ $data->alasan }}"></td>
          <td><input style="width:100px ;" class="input_table" id="upahakhir{{ $data->idriwayatkerja }}" readonly type="text" name="upahakhir[]" value="{{ $data->upahakhir }}"></td>

          <td ><input class="input_table" id="idriwayatkerja{{ $data->idriwayatkerja }}" readonly type="text" name="idriwayatkerja[]" value="{{ $data->idriwayatkerja }}"></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>
</div>


<div class="modal fade" id="modal_riwayatkerja" role="dialog" >
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

            {{-- Nama Perusahaan  --}}
            <div class="form-group row">
              <label for="nm_corp" class="col-md-3 col-form-label text-md-left">Nama Perusahaan</label>

              <div class="col-md-9">
                <input id="nm_corp" type="text" class="form-control{{ $errors->has('nm_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('nm_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nm_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- alamat perusahaan  --}}
            <div class="form-group row">
              <label for="almt_corp" class="col-md-3 col-form-label text-md-left">Alamat</label>

              <div class="col-md-9">
                <input id="almt_corp" type="text" class="form-control{{ $errors->has('almt_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('almt_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('almt_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Telp  --}}
            <div class="form-group row">
              <label for="telp_corp" class="col-md-3 col-form-label text-md-left">Telp</label>

              <div class="col-md-9">
                <input id="telp_corp" type="text" class="form-control{{ $errors->has('telp_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('telp_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('telp_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Bidang Usaha  --}}
            <div class="form-group row">
              <label for="usaha_corp" class="col-md-3 col-form-label text-md-left">Bidang Usaha</label>

              <div class="col-md-9">
                <input id="usaha_corp" type="text" class="form-control{{ $errors->has('usaha_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('usaha_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('usaha_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Jabatan Terakhir  --}}
            <div class="form-group row">
              <label for="jabakhir_corp" class="col-md-3 col-form-label text-md-left">Jabatan Terakhir</label>

              <div class="col-md-9">
                <input id="jabakhir_corp" type="text" class="form-control{{ $errors->has('jabakhir_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('jabakhir_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('jabakhir_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- status pegawai --}}
            <div class="form-group row">
              <label for="statuspeg_corp" class="col-md-3 col-form-label text-md-left">Status Pegawai</label>
              <div class="col-md-9">
                <select id="statuspeg_corp" class="form-control" >
                  1<option value="">--Pilih--</option>

                  <option value="TETAP">TETAP</option>
                  <option value="KONTRAK">KONTRAK</option>
                </select>
              </div>   
            </div>

            {{-- Nama atasan  --}}
            <div class="form-group row">
              <label for="nmatasan_corp" class="col-md-3 col-form-label text-md-left">Nama Atasan</label>

              <div class="col-md-9">
                <input id="nmatasan_corp" type="text" class="form-control{{ $errors->has('nmatasan_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('nmatasan_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nmatasan_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- jabatan atasan  --}}
            <div class="form-group row">
              <label for="jbtatasan_corp" class="col-md-3 col-form-label text-md-left">Jabatan Atasan</label>

              <div class="col-md-9">
                <input id="jbtatasan_corp" type="text" class="form-control{{ $errors->has('jbtatasan_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('jbtatasan_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('jbtatasan_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Tgl awal --}}
            <div class="form-group row">
              <label for="tmtawal_corp" class="col-md-3 col-form-label text-md-left">Tgl Mulai Kerja</label>

              <div class="col-md-9">
                <input id="tmtawal_corp" type="date" class="form-control{{ $errors->has('tmtawal_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tmtawal_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tmtawal_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Tgl akhir --}}
            <div class="form-group row">
              <label for="tmtakhir_corp" class="col-md-3 col-form-label text-md-left">Tgl Berakhir Kerja</label>

              <div class="col-md-9">
                <input id="tmtakhir_corp" type="date" class="form-control{{ $errors->has('tmtakhir_corp') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tmtakhir_corp'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tmtakhir_corp') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- alasan  --}}
            <div class="form-group row">
              <label for="alasan" class="col-md-3 col-form-label text-md-left">Alasan</label>

              <div class="col-md-9">
                <input id="alasan" type="text" class="form-control{{ $errors->has('alasan') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('alasan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('alasan') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- upah terakhir  --}}
            <div class="form-group row">
              <label for="upahakhir" class="col-md-3 col-form-label text-md-left">Upah Terakhir</label>

              <div class="col-md-9">
                <input id="upahakhir" type="text" class="form-control{{ $errors->has('upahakhir') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('upahakhir'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('upahakhir') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idriwayatkerjatampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahriwayatkerjabtn" type="button" onclick="tambahrowriwayatkerja()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updateriwayatkerjabtn" type="button" onclick="updaterowriwayatkerja()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



