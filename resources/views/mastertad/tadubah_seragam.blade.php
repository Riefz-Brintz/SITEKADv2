 {{-- Tabel seragam tad --}}

    <div class="card-body"> 
      <span style="float: right;">
        <a href="#" class="btn btn-info btn-sm mb-2" id="btn-modal-tambah" onclick="refreshseragam()" data-toggle="modal" data-target="#modal_seragam">Tambah Data seragam</a>    
      </span>
      <div class="table-responsive table-sm">
        <table id="tabelseragam" class="table table-bordered">
          <thead class="thead-dark">
            <tr >
              <th >No</th>
              <th>Aksi</th>
              <th>Tinggi Badan</th>
              <th>Berat Badan</th>
              <th>Ukuran Baju</th>
              <th>Ukuran Celana</th>
              <th>Ukuran Sepatu</th>

              <th>idseragam</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;?>
            @foreach ($TadSeragam as $data)
            <?php $no++ ;?>
            <tr id="bariske{{ $data->idseragam }}">
              <td >{{ $no }}</td>
              <td style="width:140px ; text-align: center;" nowrap>
                <a id="btnedit_seragam" href="#" onclick="editseragam({{ $data->idseragam }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_seragam" >Edit</a> | 
                <a href="#" onclick="hapusbarisseragam({{ $data->idseragam }})" class="btn btn-sm btn-danger">Hapus</a>
              </td>

              <td><input style="width:200px ;" class="input_table" id="tinggi_badan{{ $data->idseragam }}" readonly type="text" name="tinggi_badan[]" value="{{ $data->tinggi_badan }}"></td>
              <td><input style="width:200px ;" class="input_table" id="berat_badan{{ $data->idseragam }}" readonly type="text" name="berat_badan[]" value="{{ $data->berat_badan }}"></td>
              <td ><input style="width:200px ;" class="input_table" id="ukuran_baju{{ $data->idseragam }}" readonly type="text" name="ukuran_baju[]" value="{{ $data->ukuran_baju }}"></td>
              <td ><input style="width:200px ;" class="input_table" id="ukuran_celana{{ $data->idseragam }}" readonly type="text" name="ukuran_celana[]" value="{{ $data->ukuran_celana }}"></td>
              <td ><input style="width:200px ;" class="input_table" id="ukuran_sepatu{{ $data->idseragam }}" readonly type="text" name="ukuran_sepatu[]" value="{{ $data->ukuran_sepatu }}"></td>

              <td ><input class="input_table" id="idseragam{{ $data->idseragam }}" readonly type="text" name="idseragam[]" value="{{ $data->idseragam }}"></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>

          </tfoot>
        </table>
      </div>

    </div>


<div class="modal fade" id="modal_seragam" role="dialog" >
  <div class="modal-dialog modal-lg" style="width: 600px">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"><strong>Input Data Seragam</strong></h4>
      </div>
      <div class="modal-body">
        @csrf
        <div class="row"> 
          <div class="col-12">

            {{-- tinggi_badan  --}}
            <div class="form-group row">
              <label for="tinggi_badan" class="col-md-3 col-form-label text-md-left">Tinggi Badan</label>

              <div class="col-md-9">
                <input id="tinggi_badan" type="text" class="form-control{{ $errors->has('tinggi_badan') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('tinggi_badan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tinggi_badan') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- berat_badan  --}}
            <div class="form-group row">
              <label for="berat_badan" class="col-md-3 col-form-label text-md-left">Berat Badan</label>

              <div class="col-md-9">
                <input id="berat_badan" type="text" class="form-control{{ $errors->has('berat_badan') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('berat_badan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('berat_badan') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- ukuran_baju  --}}
            <div class="form-group row">
              <label for="ukuran_baju" class="col-md-3 col-form-label text-md-left">Ukuran Baju</label>

              <div class="col-md-9">
                <input id="ukuran_baju" type="text" class="form-control{{ $errors->has('ukuran_baju') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('ukuran_baju'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('ukuran_baju') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- ukuran_celana  --}}
            <div class="form-group row">
              <label for="ukuran_celana" class="col-md-3 col-form-label text-md-left">Ukuran Celana</label>

              <div class="col-md-9">
                <input id="ukuran_celana" type="text" class="form-control{{ $errors->has('ukuran_celana') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('ukuran_celana'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('ukuran_celana') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- ukuran_sepatu  --}}
            <div class="form-group row">
              <label for="ukuran_sepatu" class="col-md-3 col-form-label text-md-left">Ukuran Sepatu</label>

              <div class="col-md-9">
                <input id="ukuran_sepatu" type="text" class="form-control{{ $errors->has('ukuran_sepatu') ? ' is-invalid' : '' }}" value="">

                @if ($errors->has('ukuran_sepatu'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('ukuran_sepatu') }}</strong>
                </span>
                @endif
              </div>
            </div>

            {{-- Hidden --}}
            <div class="form-group row">
              <input id="idseragamtampung" type="hidden" readonly class="form-control" value="" >
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="tambahseragambtn" type="button" onclick="tambahrowseragam()" class="btn btn-primary" data-dismiss="modal">Tambah data</button>
        <button id="updateseragambtn" type="button" onclick="updaterowseragam()" class="btn btn-primary" data-dismiss="modal">Update data</button>
      </div>
    </div>
  </div>
</div>



