<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianPembayaran extends Model
{
    //
    protected $table="tblPembelianPembayaran";
 	protected $primaryKey="IDPembelianPembayaran";
 	protected $fillable=["IDPembelianPembayaran","IDPembelian","IDAkunPembayaran","Jenis_Pembayaran","No_Giro","Tanggal_Cair","Pembayaran"];
}

