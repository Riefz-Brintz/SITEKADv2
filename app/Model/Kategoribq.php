<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategoribq extends Model
{
    //
    protected $table="tbl_kategoribq";
 	protected $primaryKey="idkategoribq";
 	protected $fillable=["idkategoribq","kategoribq","idjenisbq","created_at","updated_at","created_by","updated_by","is_deleted"];

 	public function getjenisbq()
    {
        return $this->belongsTo(Jenisbq::class,'idjenisbq');
    }
}

