<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table="tblSupplier";
 	protected $primaryKey="IDSupplier";
 	protected $fillable=["IDSupplier","Kode_Supplier","Nama_Supplier","Grup_Supplier","Contact_Person","Telp_Supplier","Alamat_Supplier","Jatuh_Tempo"];
}
