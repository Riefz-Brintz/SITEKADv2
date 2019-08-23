<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $table="tbl_kota";
 	protected $primaryKey="idkota";
 	protected $fillable=["idkota","kd_kota","nm_kota","idprovinsi"];
}

