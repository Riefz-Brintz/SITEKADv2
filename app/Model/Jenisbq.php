<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jenisbq extends Model
{
    //
    protected $table="tbl_jenisbq";
 	protected $primaryKey="idjenisbq";
 	protected $fillable=["idjenisbq","jenisbq","created_at","updated_at","created_by","updated_by","is_deleted"];

 	
}

