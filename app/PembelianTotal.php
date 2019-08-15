<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianTotal extends Model
{
    //
    protected $table="tblPembelianTotal";
 	protected $primaryKey="IDPembelianTotal";
 	protected $fillable=["IDPembelianTotal","IDPembelian","Total","Total_Diskon","Total_Dpp","Total_Ppn","Grandtotal","Pembayaran","Sisa"];
}

