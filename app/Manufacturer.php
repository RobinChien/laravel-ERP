<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    protected $fillable = ['manufacturer_code','manufacturer_name', 'manufacturer_owner', 'manufacturer_phone', 'manufacturer_fax','manufacturer_ZipCode',
        'manufacturer_email','manufacturer_liaison','manufacturer_address','manufacturer_GUInumber',];

}
