<?php

namespace App\Profiles;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
	protected $fillable = ['user_id'];
    /**
     * Description
     *
     * @return void
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
