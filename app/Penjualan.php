<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table="tblPenjualan";
 	protected $primaryKey="IDPenjualan";
 	protected $fillable=["IDPenjualan","Nomor","Tanggal","IDCustomer","No_PO_Customer","Tgl_Jatuh_Tempo","Jatuh_Tempo","IDGudang","Jenis_Diskon","Jenis_Faktur","Keterangan","Total","Total_Diskon","Total_Ppn","Grandtotal","Pembayaran","Sisa","Status_Transaksi"];
}

