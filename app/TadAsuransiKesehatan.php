<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadAsuransiKesehatan extends Model
{
    //
    protected $table="tbl_tad_askes";
 	protected $primaryKey="idaskes";
 	protected $fillable=["idaskes","idtad","no_ektp_askes","nik_tad_askes","branch_id_askes","idprovasuransi","idprogasuransi","no_peserta_askes","no_daftar_askes","tgl_daftar_askes","faskes1","faskes2","is_deleted","created_by","updated_by"];

 	public function getprovider()
    {
        return $this->belongsTo(ProviderAsuransi::class,'idprovasuransi');
    }

    public function getprogram()
    {
        return $this->belongsTo(ProgramAsuransi::class,'idprogasuransi');
    }
}

