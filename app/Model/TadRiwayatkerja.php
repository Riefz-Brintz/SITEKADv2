<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TadRiwayatKerja extends Model
{
    //
    protected $table="tbl_tad_riwayatkerja";
 	protected $primaryKey="idriwayatkerja";
 	protected $fillable=["idriwayatkerja","idtad","no_ektp","nm_corp","almt_corp","telp_corp","usaha_corp","jabakhir_corp","statuspeg_corp","nmatasan_corp","jbtatasan_corp","tmtawal_corp","tmtakhir_corp","alasan","upahakhir","is_deleted"];
}

