<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class RoleUser extends EntrustPermission
{
    public $timestamps = false;
    protected $table = 'role_user';

    protected $fillable = [
        'user_id', 'role_id',
    ];
}
