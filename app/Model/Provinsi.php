<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    protected $table="tbl_provinsi";
 	protected $primaryKey="idprovinsi";
 	protected $fillable=["idprovinsi","kd_prov","nm_prov","created_at","updated_at"];
}

