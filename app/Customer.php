<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table="tblCustomer";
 	protected $primaryKey="IDCustomer";
 	protected $fillable=["IDCustomer","Kode_Customer","Nama_Customer","Grup_Customer","Contact_Person","Telp_Customer","Alamat_Customer","Jatuh_Tempo"];
}
