<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table="tblGudang";
 	protected $primaryKey="IDGudang";
 	protected $fillable=["Gudang","PIC","Alamat_Gudang"];
 	
}
