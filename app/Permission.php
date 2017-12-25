<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

/**
 * @property mixed Permission
 */
class Permission extends EntrustPermission
{

    protected $fillable = [
        'id', 'parent_id','name', 'display_name', 'description','status', 'route',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function parent()
    {
        return $this->hasOne(Permission::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }

}
