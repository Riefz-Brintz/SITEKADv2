<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProviderAsuransi extends Model
{
    //
    protected $table="tbl_prov_asuransi";
 	protected $primaryKey="idprovasuransi";
 	protected $fillable=["idprovasuransi","kd_provider","nm_provider"];
}

