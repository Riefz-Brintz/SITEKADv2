<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    //
    protected $table="tbl_faskes";
 	protected $primaryKey="idfaskes";
 	protected $fillable=["idfaskes","kd_faskes","nm_faskes","tipe_faskes","alamat_faskes","rt_faskes","rw_faskes","kodepos_faskes","kota_faskes","provinsi_faskes","phone_faskes","is_deleted"];
}

