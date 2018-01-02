<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    protected $table = 'product_categories';
    protected $fillable = [
        'category_name', 'parent_id',
    ];

    public function product_category()
    {
        return $this->belongsToMany(Product_Category::class);
    }

    public function parent()
    {
        return $this->hasOne(Product_Category::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Product_Category::class, 'parent_id', 'id');
    }

}
