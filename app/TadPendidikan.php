<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadPendidikan extends Model
{
    //
    protected $table="tbl_tad_pendidikan";
 	protected $primaryKey="idpendidikan";
 	protected $fillable=["idpendidikan","idtad","no_ektp","tingkatsekolah","namasekolah","kota","jurusan","tahunmasuk","tahunlulus","keterangan","is_deleted"];
}

