<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingPerusahaan extends Model
{
    protected $table="tblsettingperusahaan";
 	protected $primaryKey="IDPerusahaan";
 	protected $fillable=["Nama_perusahaan","Alamat_perusahaan","Telp1_perusahaan","Telp2_perusahaan","Email_perusahaan","Tunjangan_menikah","Tunjangan_bpjs"];
}
