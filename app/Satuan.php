<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    //
    protected $table="tblsatuan";
 	protected $primaryKey="IDSatuan";
 	protected $fillable=["IDSatuan","Satuan"];
}
