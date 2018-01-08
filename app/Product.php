<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table = 'products';
    protected $fillable = [
        'product_code', 'product_name','common_id','category_id','product_price','product_status','product_or_item','manufacturer_id','product_stock'
    ];

    public function bom()
    {
        return $this->belongsToMany($this, 'bom', 'parent_id', 'child_id')->withPivot(['qty']);
    }

    public function bomRecursive()
    {
        return $this->bom()->with('bomRecursive');
    }
//    public function bom_parent()
//    {
//        return $this->belongsToMany($this, 'bom', 'parent_id', 'child_id');
//    }

//    public function bom_child()
//    {
//        return $this->belongsToMany($this, 'bom', 'child_id', 'parent_id')->withPivot(['qty']);;
//    }

    public function common_code()
    {
        return $this->belongsTo(Common_Code::class, 'common_id');
    }

    public function product_category()
    {
        return $this->belongsTo(Product_Category::class, 'category_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }


}
