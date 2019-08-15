<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanPembayaran extends Model
{
    //
    protected $table="tblPenjualanPembayaran";
 	protected $primaryKey="IDPenjualanPembayaran";
 	protected $fillable=["IDPenjualanPembayaran","IDPenjualan","IDAkunPembayaran","Jenis_Pembayaran","No_Giro","Tanggal_Cair","Pembayaran"];
}

