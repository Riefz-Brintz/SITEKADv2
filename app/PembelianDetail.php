<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    //
    protected $table="tblPembelianDetail";
 	protected $primaryKey="IDPembelianDetail";
 	protected $fillable=["IDPembelianDetail","IDPembelian","IDBarang","IDSatuan","No_Seri","Qty","Harga","Diskon","Nilai_Diskon","Subtotal"];
}

