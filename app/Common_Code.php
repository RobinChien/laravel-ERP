<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Common_Code extends Model
{
    //
    protected $table = 'common_codes';
    protected $fillable = ['code_name','parent_id', 'permission_id', ];
}
