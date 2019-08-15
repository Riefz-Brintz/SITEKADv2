<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table="tblbarang";
 	protected $primaryKey="IDBarang";
 	protected $fillable=["IDBarang","Kode_Barang","Nama_Barang","IDSatuan","Harga_Barang","Grup_Barang"];
}

