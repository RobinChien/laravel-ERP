<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Common_Code extends Model
{
    //
    protected $table = 'common_codes';
    protected $fillable = ['code_name','parent_id', 'permission_id', ];
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
    public function parent()
    {
        return $this->belongsTo(Common_Code::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
