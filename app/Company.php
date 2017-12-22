<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['company_code','company_name', 'company_owner', 'company_phone', 'company_fax','company_email',
                            'company_url','company_ZipCode','company_address','company_GUInumber', 'created_at', 'updated_at'];

}
