<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;
    protected $primaryKey='user_id';

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');

    }

    protected $fillable = [
        'user_name', 'user_email', 'password','user_birth','user_addr','user_phone','user_status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
