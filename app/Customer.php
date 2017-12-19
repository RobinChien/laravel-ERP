<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['customer_code','customer_name', 'customer_owner', 'customer_phone', 'customer_fax','customer_ZipCode',
        'customer_email','customer_liaison','customer_address','customer_GUInumber',];

}
