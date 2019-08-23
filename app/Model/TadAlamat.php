<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TadAlamat extends Model
{
    //
    protected $table="tbl_tad_alamat";
 	protected $primaryKey="idalamattad";
 	protected $fillable=["idalamattad","idtad","no_ektp","nik_tad","status_alamat","alamattad","rt_tad","rw_tad","kd_dekeltad","desakelurahantad","kd_kecamatantad","kecamatantad","idprovinsi","idkota","no_hpphone","kodepos","is_deleted","created_at","updated_at"];

 	public function getkota()
    {
        return $this->belongsTo(Kota::class,'idkota');
    }

    public function getprovinsi()
    {
        return $this->belongsTo(Provinsi::class,'idprovinsi');
    }
}

