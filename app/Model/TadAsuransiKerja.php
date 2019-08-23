<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TadAsuransiKerja extends Model
{
    //
    protected $table="tbl_tad_asker";
 	protected $primaryKey="idasker";
 	protected $fillable=["idasker","idtad","no_ektp","nik_tad","branch_id","idprovasuransi","idprogasuransi","no_kpj","tgl_kpj","npp","no_jpn","is_deleted"];
 	
 	public function getprovider()
    {
        return $this->belongsTo(ProviderAsuransi::class,'idprovasuransi');
    }

    public function getprogram()
    {
        return $this->belongsTo(ProgramAsuransi::class,'idprogasuransi');
    }
}

