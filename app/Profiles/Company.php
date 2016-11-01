<?php

namespace App\Profiles;

use Illuminate\Database\Eloquent\Model;
use App\Profiles\CompanyProfile;
use App\User;

class Company extends Model
{
    /**
     * Description
     *
     * @return void
     */
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function profile()
    {
    	return $this->hasOne(CompanyProfile::class);
    }
    
    
}
