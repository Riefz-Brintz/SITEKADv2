<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Standardbq extends Model
{
    //
    protected $table="tbl_standardbq";
 	protected $primaryKey="idstandardbq";
 	protected $fillable=["idstandardbq","standardbq","idkategoribq","created_at","updated_at","created_by","updated_by","is_deleted"];

 	public function getkategoribq()
    {
        return $this->belongsTo(Jenisbq::class,'idkategoribq');
    }
}

