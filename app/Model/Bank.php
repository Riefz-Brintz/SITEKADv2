<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $table="tbl_bank";
 	protected $primaryKey="idbank";
 	protected $fillable=["idbank","kd_bank","nm_bank","jenis_bank","created_at","updated_at","is_deleted"];
}

