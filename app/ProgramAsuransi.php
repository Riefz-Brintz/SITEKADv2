<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramAsuransi extends Model
{
    //
    protected $table="tbl_prog_asuransi";
 	protected $primaryKey="idprogasuransi";
 	protected $fillable=["idprogasuransi","kd_progasur","nm_progasur","prov","idprovasuransi","premi_perush","premi_kary","rp_perush","rp_kary","jenis_asuransi","prog_wajib","up_date","is_deleted"];
}

