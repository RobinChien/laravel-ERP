<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = [
        'purchases_no','user_id','manufacturer_id','purchases_type',
    ];
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }

}
