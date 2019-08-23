 {{-- Tabel asker tad --}}
 
          <div class="card-body">
      
            <span style="float: right;">
                <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshasker()" data-toggle="modal" data-target="#modal_asker"><i class="fas fa-plus mr-2"></i>Tambah Data Asker</a>    
            </span>
            <div class="table-responsive table-sm">
            <table id="tabelasker" class="table table-bordered">
                <thead class="thead-dark">
                <tr >
                  <th >No</th>
                   <th>Aksi</th>
                   <th>Provider</th>
                   <th>Program</th>
                   <th>No KPJ</th>
                   <th>Tgl KPJ</th>
                   <th>No JPN</th>
                   <th>NPP</th>
                   <th>idprovider</th>
                   <th>idprogram</th>
                   <th>idasker</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0;?>
                    @foreach ($TadAsker as $data)
                      <?php $no++ ;?>
                      <tr id="barisaskerke{{ $data->idasker }}">
                        <td >{{ $no }}</td>
                        <td style="width:80px ; text-align: center;" nowrap>
                          <a id="btnedit_asker" href="#" onclick="editasker({{ $data->idasker }})" title="Edit Data" data-toggle="modal" data-target="#modal_asker" ><i class="fas fa-edit mr-2"></i></a> 
                          <a href="#" onclick="hapusbarisasker({{ $data->idasker }})" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>
                        </td>
                       
                       {{-- <td>{{ $data->no_kpj }}</td> --}}
                       
                        <td><input style="width:250px ;" class="input_table" id="nm_provider2{{ $data->idasker }}" readonly type="text" name="nm_provider2[]" value="{{ $data->getprovider->nm_provider }}"></td>
                        <td><input style="width:250px ;" class="input_table" id="nm_progasur2{{ $data->idasker }}" readonly type="text" name="nm_progasur2[]" value="{{ $data->getprogram->nm_progasur }}"></td>
                        <td ><input style="width:150px ;" class="input_table" id="no_kpj{{ $data->idasker }}" readonly type="text" name="no_kpj[]" value="{{ $data->no_kpj }}"></td>
                        <td><input style="width:100px ;" class="input_table" id="tgl_kpj{{ $data->idasker }}" readonly type="text" name="tgl_kpj[]" value="{{ $data->tgl_kpj }}"></td>
                        <td><input style="width:150px ;" class="input_table" id="no_jpn{{ $data->idasker }}" readonly type="text" name="no_jpn[]" value="{{ $data->no_jpn }}"></td>
                        <td><input style="width:150px ;" class="input_table" id="npp{{ $data->idasker }}" readonly type="text" name="npp[]" value="{{ $data->npp }}"></td>
                        <td ><input class="input_table" id="idprovasuransi2{{ $data->idasker }}" readonly type="text" name="idprovasuransi2[]" value="{{ $data->idprovasuransi }}"></td>
                        <td ><input class="input_table" id="idprogasuransi2{{ $data->idasker }}" readonly type="text" name="idprogasuransi2[]" value="{{ $data->idprogasuransi }}"></td>
                        
                        <td ><input class="input_table" id="idasker{{ $data->idasker }}" readonly type="text" name="idasker[]" value="{{ $data->idasker }}"></td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
             
                </tfoot>
            </table>
          </div>

          </div>
  
<div class="modal fade" id="modal_asker" role="dialog" >
      <div class="modal-dialog modal-lg" style="width: 600px">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
              <h4 class="modal-title"><strong>Input Data asker</strong></h4>
            </div>
            <div class="modal-body">
              @csrf
            <div class="row"> 
              <div class="col-12">

                    {{-- Provider --}}
                    <div class="form-group row">
                        <label for="selectprovider2" class="col-md-3 col-form-label text-md-left">Provider</label>

                        <div class="col-md-9">
                            <select class="form-control" id="selectprovider2"  style="width: 100%">
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

                    {{-- PRogram --}}
                    <div class="form-group row">
                        <label for="selectprogram2" class="col-md-3 col-form-label text-md-left">Program</label>

                        <div class="col-md-9">
                            <select class="form-control" id="selectprogram2"  style="width: 100%">
                              {{--   <option value="">--Pilih--</option>
                                @foreach ($ProgramAsuransi as $data)
                                <option   value="{{ $data->idprogasuransi }}">{{ $data->nm_progasur }}</option>   
                                @endforeach --}}
                            </select>
                        </div>
                        @if ($errors->has('selectprogram2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('selectprogram2') }}</strong>
                        </span>
                        @endif
                    </div>


                          {{-- no kpj  --}}
                    <div class="form-group row">
                        <label for="no_kpj" class="col-md-3 col-form-label text-md-left">No KPJ</label>

                        <div class="col-md-9">
                            <input id="no_kpj" type="text" class="form-control{{ $errors->has('no_kpj') ? ' is-invalid' : '' }}" value="">

                            @if ($errors->has('no_kpj'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_kpj') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                      {{-- Tgl kpj --}}
                    <div class="form-group row">
                        <label for="tgl_kpj" class="col-md-3 col-form-label text-md-left">Tgl KPJ</label>

                        <div class="col-md-9">
                            <input id="tgl_kpj" type="date" class="form-control{{ $errors->has('tgl_kpj') ? ' is-invalid' : '' }}" value="">

                            @if ($errors->has('tgl_kpj'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tgl_kpj') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                       {{-- no jpn  --}}
                    <div class="form-group row">
                        <label for="no_jpn" class="col-md-3 col-form-label text-md-left">No JPN</label>

                        <div class="col-md-9">
                            <input id="no_jpn" type="text" class="form-control{{ $errors->has('no_jpn') ? ' is-invalid' : '' }}" value="">

                            @if ($errors->has('no_jpn'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_jpn') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    {{-- NPP  --}}
                    <div class="form-group row">
                        <label for="npp" class="col-md-3 col-form-label text-md-left">NPP</label>

                        <div class="col-md-9">
                            <input id="npp" type="text" class="form-control{{ $errors->has('npp') ? ' is-invalid' : '' }}" value="">

                            @if ($errors->has('npp'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('npp') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    

                    

                  {{-- Hidden --}}
                  <div class="form-group row">
                        <input id="idaskertampung" type="hidden" readonly class="form-control" value="" >
                  </div>

                </div>
            </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="tambahaskerbtn" type="button" onclick="tambahrowasker()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
              <button id="updateaskerbtn" type="button" onclick="updaterowasker()" class="btn btn-primary" data-dismiss="modal">Update data</button>
            </div>
          </div>
      </div>
</div>



