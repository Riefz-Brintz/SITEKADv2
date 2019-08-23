<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    protected $table="tbl_role_detail";
 	protected $primaryKey="idroledetail";
 	protected $fillable=["idrole","idmenu","lihat","tambah","ubah","hapus","is_deleted"];

 		public function getmenu()
    {
        return $this->belongsTo(Menu::class,'idmenu');
    }
 	
}
