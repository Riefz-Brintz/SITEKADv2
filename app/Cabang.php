<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    //
    protected $table="tbl_cabang";
 	protected $primaryKey="idcabang";
 	protected $fillable=["idcabang","kd_cabang","cabang","company_id","location_id","inisial","deskripsi","address","kota","telp1","telp2","fax","tgl_aktif_start","tgl_aktif_end","is_deleted"];
}

