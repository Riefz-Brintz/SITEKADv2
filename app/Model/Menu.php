<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="tbl_menu";
 	protected $primaryKey="idmenu";
 	protected $fillable=["nama_menu","grup_menu","created_at","updated_at"];
 	
}
