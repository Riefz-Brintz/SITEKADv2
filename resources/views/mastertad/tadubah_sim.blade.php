 {{-- Tabel sim tad --}}
 <div class="card-body">
  <span style="float: right;">
    <a href="#" class="btn btn-primary btn-sm mb-2" id="btn-modal-tambah" onclick="refreshsim()" data-toggle="modal" data-target="#modal_sim"><i class="fas fa-plus mr-2"></i>Tambah Data Sim</a>    
  </span>
  <div class="table-responsive table-sm">
    <table id="tabelsim" class="table table-bordered">
      <thead class="thead-dark">
        <tr >
          <th >No</th>
          <th>Aksi</th>
          <th>No SIM</th>
          <th>Jenis SIM</th>
          <th>Tanggal Berakhir</th>

          <th>idsim</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;?>
        @foreach ($TadSim as $data)
        <?php $no++ ;?>
        <tr id="barissimke{{ $data->idsim }}">
          <td >{{ $no }}</td>
          <td style="width:80px ; text-align: center;" nowrap>
            <a id="btnedit_sim" href="#" onclick="editsim({{ $data->idsim }})" title="Edit Data" data-toggle="modal" data-target="#modal_sim" ><i class="fas fa-edit mr-2"></i></a> 
            <a href="#" onclick="hapusbarissim({{ $data->idsim }})" title="Hapus Data"><i class="fas fa-trash mr-2"></i></a>
          </td>

          <td><input style="width:100px ;" class="input_table" id="no_sim{{ $data->idsim }}" readonly type="text" name="no_sim[]" value="{{ $data->no_sim }}"></td>
          <td><input style="width:250px ;" class="input_table" id="jenis_sim{{ $data->idsim }}" readonly type="text" name="jenis_sim[]" value="{{ $data->jenis_sim }}"></td>
          <td ><input style="width:200px ;" class="input_table" id="tglakhir_sim{{ $data->idsim }}" readonly type="text" name="tglakhir_sim[]" value="{{ $data->tglakhir_sim }}"></td>

          <td ><input class="input_table" id="idsim{{ $data->idsim }}" readonly type="text" name="idsim[]" value="{{ $data->idsim }}"></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>

</div>


<div class="modal fade" id="modal_sim" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data SIM</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- no_sim  --}}
            <div class="form-group row">
              <label for="no_sim" class="col-md-3 col-form-label text-md-left">No SIM</label>

              <div class="col-md-9">
                <input id="no_sim" type="text" class="form-control{{ $errors->has('no_sim') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('no_sim'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_sim') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Jenis sim --}}
            <div class="form-group row">
              <label for="jenis_sim" class="col-md-3 col-form-label text-md-left">Jenis SIM</label>
              <div class="col-md-9">
                <select id="jenis_sim" class="form-control" >
                  1<option value="">--Pilih--</option>

                  <option value="C">C</option>
                  <option value="A">A</option>
                  <option value="B1">B1</option>
                  <option value="B2">B2</option>
                </select>
              </div>   
            </div>

            {{-- Tanggal akhir  --}}
            <div class="form-group row">
              <label for="tglakhir_sim" class="col-md-3 col-form-label text-md-left">Tanggal Berakhir</label>

              <div class="col-md-9">
                <input id="tglakhir_sim" type="date" class="form-control{{ $errors->has('tglakhir_sim') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tglakhir_sim'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tglakhir_sim') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idsimtampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahsimbtn" type="button" onclick="tambahrowsim()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updatesimbtn" type="button" onclick="updaterowsim()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



