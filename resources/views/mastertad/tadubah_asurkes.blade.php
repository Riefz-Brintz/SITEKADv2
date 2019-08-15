 {{-- Tabel askes tad --}}
 

    <div class="card-body">
      <span style="float: right;">
        <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambah" onclick="refreshaskes()" data-toggle="modal" data-target="#modal_askes">Tambah Data askes</a>    
      </span>
      <div class="table-responsive table-sm">
        <table id="tabelaskes" class="table table-bordered">
          <thead class="thead-dark">
            <tr >
              <th >No</th>
              <th>Aksi</th>
              <th>No Peserta</th>
              <th>No Daftar</th>
              <th>Tgl Daftar</th>
              <th>Provider</th>
              <th>Program</th>
              <th>Faskes 1</th>
              <th>Faskes 2</th>
              <th>idprovider</th>
              <th>idprogram</th>
         
              <th>idaskes</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;?>
            @foreach ($TadAskes as $data)
            <?php $no++ ;?>
            <tr id="bariske{{ $data->idaskes }}">
              <td >{{ $no }}</td>
              <td style="width:140px ; text-align: center;" nowrap>
                <a id="btnedit_askes" href="#" onclick="editaskes({{ $data->idaskes }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_askes" >Edit</a> | 
                <a href="#" onclick="hapusbarisaskes({{ $data->idaskes }})" class="btn btn-sm btn-danger">Hapus</a>
              </td>

              {{-- <td>{{ $data->no_peserta_askes }}</td> --}}

              <td ><input style="width:150px ;" class="input_table" id="no_peserta_askes{{ $data->idaskes }}" readonly type="text" name="no_peserta_askes[]" value="{{ $data->no_peserta_askes }}"></td>
              <td><input style="width:200px ;" class="input_table" id="no_daftar_askes{{ $data->idaskes }}" readonly type="text" name="no_daftar_askes[]" value="{{ $data->no_daftar_askes }}"></td>
              <td class="td_input"><input style="width:100px ;" class="input_table" id="tgl_daftar_askes{{ $data->idaskes }}" readonly type="text" name="tgl_daftar_askes[]" value="{{ $data->tgl_daftar_askes }}"></td>
              <td><input style="width:150px ;" class="input_table" id="nm_provider{{ $data->idaskes }}" readonly type="text" name="nm_provider[]" value="{{ $data->getprovider->nm_provider }}"></td>
              <td><input style="width:150px ;" class="input_table" id="nm_progasur{{ $data->idaskes }}" readonly type="text" name="nm_progasur[]" value="{{ $data->getprogram->nm_progasur }}"></td>
              <td><input style="width:150px ;" class="input_table" id="faskes1{{ $data->idaskes }}" readonly type="text" name="faskes1[]" value="{{ $data->faskes1 }}"></td>
              <td><input style="width:150px ;" class="input_table" id="faskes2{{ $data->idaskes }}" readonly type="text" name="faskes2[]" value="{{ $data->faskes2 }}"></td>
              <td ><input class="input_table" id="idprovasuransi{{ $data->idaskes }}" readonly type="text" name="idprovasuransi[]" value="{{ $data->idprovasuransi }}"></td>
              <td ><input class="input_table" id="idprogasuransi{{ $data->idaskes }}" readonly type="text" name="idprogasuransi[]" value="{{ $data->idprogasuransi }}"></td>
              <td ><input class="input_table" id="idaskes{{ $data->idaskes }}" readonly type="text" name="idaskes[]" value="{{ $data->idaskes }}"></td>
            </tr>
            @endforeach
          </tbody>
     
        </table>
      </div>

    </div>


<div class="modal fade" id="modal_askes" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data askes</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- Provider --}}
            <div class="form-group row">
              <label for="selectprovider" class="col-md-3 col-form-label text-md-left">Provider</label>

              <div class="col-md-9">
                <select class="form-control" id="selectprovider"  style="width: 100%">
                  <option value="">--Pilih--</option>
                               {{--  @foreach ($ProviderAsuransi as $data)
                                <option   value="{{ $data->idprovasuransi }}">{{ $data->nm_provider }}</option>   
                                @endforeach --}}
                              </select>
                            </div>
                            @if ($errors->has('selectprovider'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('selectprovider') }}</strong>
                            </span>
                            @endif
                          </div>

                          {{-- PRogram --}}
                          <div class="form-group row">
                            <label for="selectprogram" class="col-md-3 col-form-label text-md-left">Program</label>

                            <div class="col-md-9">
                              <select class="form-control" id="selectprogram"  style="width: 100%">
                              {{--   <option value="">--Pilih--</option>
                                @foreach ($ProgramAsuransi as $data)
                                <option   value="{{ $data->idprogasuransi }}">{{ $data->nm_progasur }}</option>   
                                @endforeach --}}
                              </select>
                            </div>
                            @if ($errors->has('selectprogram'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('selectprogram') }}</strong>
                            </span>
                            @endif
                          </div>


                          {{-- no peserta askes --}}
                          <div class="form-group row">
                            <label for="no_peserta_askes" class="col-md-3 col-form-label text-md-left">No Peserta</label>

                            <div class="col-md-9">
                              <input id="no_peserta_askes" type="text" class="form-control{{ $errors->has('no_peserta_askes') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('no_peserta_askes'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_peserta_askes') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                          {{-- no daftar askes TAD --}}
                          <div class="form-group row">
                            <label for="no_daftar_askes" class="col-md-3 col-form-label text-md-left">Nama Lengkap</label>

                            <div class="col-md-9">
                              <input id="no_daftar_askes" type="text" class="form-control{{ $errors->has('no_daftar_askes') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('no_daftar_askes'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_daftar_askes') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                          {{-- Tgl daftar --}}
                          <div class="form-group row">
                            <label for="tgl_daftar_askes" class="col-md-3 col-form-label text-md-left">Tgl Daftar</label>

                            <div class="col-md-9">
                              <input id="tgl_daftar_askes" type="date" class="form-control{{ $errors->has('tgl_daftar_askes') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('tgl_daftar_askes'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tgl_daftar_askes') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                              {{-- faskes 1 --}}
                          <div class="form-group row">
                            <label for="faskes1" class="col-md-3 col-form-label text-md-left">Faskes 1</label>

                            <div class="col-md-9">
                              <input id="faskes1" type="text" class="form-control{{ $errors->has('faskes1') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('faskes1'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('faskes1') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                              {{-- faskes 2 --}}
                          <div class="form-group row">
                            <label for="faskes2" class="col-md-3 col-form-label text-md-left">Faskes 2</label>

                            <div class="col-md-9">
                              <input id="faskes2" type="text" class="form-control{{ $errors->has('faskes2') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('faskes2'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('faskes2') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                          {{-- Hidden --}}
                          <div class="form-group row">
                           
                            <input id="idaskestampung" type="hidden" readonly class="form-control" value="" >
                          </div>

                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="tambahaskesbtn" type="button" onclick="tambahrowaskes()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
                      <button id="updateaskesbtn" type="button" onclick="updaterowaskes()" class="btn btn-primary" data-dismiss="modal">Update data</button>
                    </div>
                  </div>
                </div>
              </div>



