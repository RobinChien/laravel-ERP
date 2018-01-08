<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_details extends Model
{
    //
    protected $table = 'sale_details';


    protected $fillable = [
        'sale_id','sale_detail_no','product_id','sale_qty','sale_price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }
}
