<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tadkk extends Model
{
    //
    protected $table="tbl_tad_kk";
 	protected $primaryKey="idkktad";
 	protected $fillable=["idkktad","idtad","nik_kk","no_ektp","nik_tad","no_ektpkk","nama_kk","hub_keluarga","tmp_lahir_kk","tgl_lahir_kk","jenkel_kk","goldarah_kk","telp_hpkk","kd_faskes1","nm_faskes1","kd_faskes2","nm_faskes2","is_deleted"];
}

