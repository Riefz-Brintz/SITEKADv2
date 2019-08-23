<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tad extends Model
{
    //
    protected $table="tbl_tad_data_pribadi";
 	protected $primaryKey="IDTad";
 	protected $fillable=["IDTad","no_ektp","nik_tad","idcabang","umur","nm_lengkaptad","tmp_lahir","tgl_lahir","jenis_kel","agama","statusperkawinan","warga_negara","gol_darah","nm_ibukandung","catatan","emailadd","npwptad","gambar_ektp","telp","foto_diri","is_deleted"];

 	 public function getcabang()
    {
        return $this->belongsTo(Cabang::class,'idcabang');
    }
}

