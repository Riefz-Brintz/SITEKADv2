<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TadSeragam extends Model
{
    //
    protected $table="tbl_tad_seragam";
 	protected $primaryKey="idseragam";
 	protected $fillable=["idseragam","idtad","no_ektp","nik_tad","tinggi_badan","berat_badan","ukuran_baju","ukuran_celana","ukuran_sepatu","is_deleted"];
}

