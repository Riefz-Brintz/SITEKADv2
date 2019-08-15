<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    //
    protected $table="tblPenjualanDetail";
 	protected $primaryKey="IDPenjualanDetail";
 	protected $fillable=["IDPenjualanDetail","IDPenjualan","IDBarang","IDSatuan","No_Seri","Qty","Harga","Diskon","Nilai_Diskon","Subtotal"];
}

