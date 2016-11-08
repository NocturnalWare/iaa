<?php

namespace App\Profiles;

use Illuminate\Database\Eloquent\Model;
use App\Profiles\CompanyProfile;
use App\Orders\Order;
use App\User;

class Company extends Model
{
	protected $fillable = [
		'name',
		'industry'
	];
    
    protected $with = ['profile'];
    
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
    
	/**
     * Description
     *
     * @return void
     */
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }
	        
}
