<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Statusperkawinan extends Model
{
    //
    protected $table="rf_marital";
 	protected $primaryKey="id";
 	protected $fillable=["id","name"];
}

