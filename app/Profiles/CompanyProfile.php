<?php

namespace App\Profiles;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
    	'phone',
    	'email',
    	'street_1',
    	'street_2',
    	'city',
    	'state',
    	'zip',
    	'country'
    ];
}
