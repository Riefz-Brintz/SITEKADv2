<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadKeluarga extends Model
{
    //
    protected $table="tbl_tad_keluarga";
 	protected $primaryKey="idkeluarga";
 	protected $fillable=["idkeluarga","idtad","no_ektp","niktad_alamat_id","nm_kel","hub_kel","alamat_kel","telp_kel","agama","status_alamat","is_deleted"];
}

