<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkunPembayaran extends Model
{
    protected $table="tblAkunPembayaran";
 	protected $primaryKey="IDAkunPembayaran";
 	protected $fillable=["Nama_Akun","Jenis_Akun","No_Rekening","AN_Rekening"];
 	
}
