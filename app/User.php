<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','idrole','idcabang','is_deleted','aktif'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getcabang()
    {
        return $this->belongsTo(Cabang::class,'idcabang');
    }

    public function getrole()
    {
        return $this->belongsTo(Role::class,'idrole');
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
