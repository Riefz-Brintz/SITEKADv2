<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
    //
    protected $table="rf_gender";
 	protected $primaryKey="id";
 	protected $fillable=["id","name"];
}

