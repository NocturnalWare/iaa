<?php

namespace App\Profiles;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    const GOD = 777;
    const ADMIN = 1;
    const EMPLOYEE = 2;
    const USER = 3;
    const VENDOR = 4;

    /**
     * Description
     *
     * @return void
     */
    public function role()
    {
    	return $this->belongsTo(App\User::class);
    }
    
}
