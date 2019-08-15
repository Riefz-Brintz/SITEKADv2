<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $table="tblPembelian";
 	protected $primaryKey="IDPembelian";
 	protected $fillable=["IDPembelian","Nomor","Tanggal","IDSupplier","No_SJ_Supplier","Tgl_Jatuh_Tempo","Jatuh_Tempo","IDGudang","Jenis_Faktur","Keterangan","Status_Transaksi"];
}

