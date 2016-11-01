<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profiles\UserProfile;
use App\Profiles\UserRole;
use App\Profiles\Company;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Description
     *
     * @return void
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
}
