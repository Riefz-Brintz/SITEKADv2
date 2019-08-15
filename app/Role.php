<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table="tbl_role";
 	protected $primaryKey="idrole";
 	protected $fillable=["nama_role","keterangan","is_deleted","created_at","updated_at"];
 	
}
