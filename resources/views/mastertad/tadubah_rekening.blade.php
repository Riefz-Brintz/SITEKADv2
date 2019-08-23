 {{-- Tabel rekening tad --}}
 
    <div class="card-body">
      <span style="float: right;">
        <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshrekening()" data-toggle="modal" data-target="#modal_rekening"><i class="fas fa-plus mr-2"></i>Tambah Data rekening</a>    
      </span>
      <div class="table-responsive table-sm">
        <table id="tabelrekening" class="table table-bordered">
          <thead class="thead-dark">
            <tr >
              <th >No</th>
              <th>Aksi</th>
              <th>Nama Bank</th>
              <th>Jenis</th>
              <th>No Rekening</th>
              <th>idbank</th>
              <th>idrekening</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;?>
            @foreach ($TadRekening as $data)
            <?php $no++ ;?>
            <tr id="barisrekeningke{{ $data->idrekening }}">
              <td >{{ $no }}</td>
              <td style="width:80px ; text-align: center;" nowrap>
                <a id="btnedit_rekening" href="#" onclick="editrekening({{ $data->idrekening }})" title="Edit Data" data-toggle="modal" data-target="#modal_rekening" ><i class="fas fa-edit mr-2"></i></a> 
                <a href="#" onclick="hapusbarisrekening({{ $data->idrekening }})" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>
              </td>

              {{-- <td>{{ $data->no_rekening }}</td> --}}

              <td><input style="width:250px ;" class="input_table" id="nm_bank{{ $data->idrekening }}" readonly type="text" name="nm_bank[]" value="{{ $data->nm_bank }}"></td>
              <td><input style="width:250px ;" class="input_table" id="jenis_bank{{ $data->idrekening }}" readonly type="text" name="jenis_bank[]" value="{{ $data->jenis_bank }}"></td>
              <td ><input style="width:250px ;" class="input_table" id="no_rekening{{ $data->idrekening }}" readonly type="text" name="no_rekening[]" value="{{ $data->no_rekening }}"></td>
              <td ><input class="input_table" id="idbank{{ $data->idrekening }}" readonly type="text" name="idbank[]" value="{{ $data->idbank }}"></td>

              <td ><input class="input_table" id="idrekening{{ $data->idrekening }}" readonly type="text" name="idrekening[]" value="{{ $data->idrekening }}"></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>

          </tfoot>
        </table>
      </div>

    </div>


<div class="modal fade" id="modal_rekening" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data Rekening</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- Nama bank --}}
            <div class="form-group row">
              <label for="selectbank" class="col-md-3 col-form-label text-md-left">Bank</label>

              <div class="col-md-9">
                <select class="form-control" id="selectbank"  style="width: 100%">
                  <option value="">--Pilih--</option>
                               {{--  @foreach ($ProviderAsuransi as $data)
                                <option   value="{{ $data->idprovasuransi }}">{{ $data->nm_provider }}</option>   
                                @endforeach --}}
                              </select>
                            </div>
                            @if ($errors->has('selectprovider2'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('selectprovider2') }}</strong>
                            </span>
                            @endif
                          </div>

                          {{-- Jenis Bank --}}
                          <div class="form-group row">
                            <label for="jenis_bank" class="col-md-3 col-form-label text-md-left">Jenis Bank</label>

                            <div class="col-md-9">
                              <input id="jenis_bank" type="text" class="form-control{{ $errors->has('jenis_bank') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('jenis_bank'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenis_bank') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>


                          {{-- no_rekening  --}}
                          <div class="form-group row">
                            <label for="no_rekening" class="col-md-3 col-form-label text-md-left">No Rekening</label>

                            <div class="col-md-9">
                              <input id="no_rekening" type="text" class="form-control{{ $errors->has('no_rekening') ? ' is-invalid' : '' }}" value="">

                              @if ($errors->has('no_rekening'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_rekening') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>


                          {{-- Hidden --}}
                          <div class="form-group row">
                            <input id="idrekeningtampung" type="hidden" readonly class="form-control" value="" >
                          </div>

                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="tambahrekeningbtn" type="button" onclick="tambahrowrekening()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
                      <button id="updaterekeningbtn" type="button" onclick="updaterowrekening()" class="btn btn-primary" data-dismiss="modal">Update data</button>
                    </div>
                  </div>
                </div>
              </div>



