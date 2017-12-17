<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey='user_id';
    protected $fillable = [
        'user_name', 'user_email', 'password','user_birth','user_addr','user_phone','user_status','rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role'); //,'assigned_roles'
    }
}
