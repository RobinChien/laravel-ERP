<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_code', 'product_name','common_id','category_id','product_price','product_status','product_isitem','manufacturer_id',
    ];

    public function bom_parent()
    {
        return $this->belongsToMany($this, 'bom', 'parent_id', 'child_id');
    }

    public function bom_child()
    {
        return $this->belongsToMany($this, 'bom', 'child_id', 'parent_id');
    }
}
