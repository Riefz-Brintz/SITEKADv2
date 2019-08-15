<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadSim extends Model
{
    //
    protected $table="tbl_tad_sim";
 	protected $primaryKey="idsim";
 	protected $fillable=["idsim","idtad","no_ektp","nik_tad","jenis_sim","no_sim","tglakhir_sim","is_deleted"];
}

