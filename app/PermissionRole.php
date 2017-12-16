<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class PermissionRole extends EntrustPermission
{
    public $timestamps = false;
    protected $table = 'permission_role';

    protected $fillable = [
        'permission_id', 'role_id',
    ];
}
