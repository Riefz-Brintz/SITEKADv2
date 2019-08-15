<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadRekening extends Model
{
    //
    protected $table="tbl_tad_rekening";
 	protected $primaryKey="idrekening";
 	protected $fillable=["idrekening","no_ektp","nik_tad","idtad","idbank","kd_bank","nm_bank","jenis_bank","no_rekening","created_at","updated_at","is_deleted"];
}

