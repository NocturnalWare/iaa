<?php

namespace App\Orders;

use App\Profiles\Company;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{    
    const ORDERED = 1;
    const ARTWORK = 2;
    const PRODUCTION = 3;
    const COMPLETE = 4;
    const SHIPPED = 5;
    const DELIVERED = 6;
    protected $with = ['notes', 'company', 'lines'];

    /**
     * Description
     *
     * @return void
     */
    public function status()
    {
    	return $this->belongsTo(OrderStatus::class);
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
        
    /**
     * Description
     *
     * @return void
     */
    public function updates()
    {
    	return $this->hasMany(OrderUpdate::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function lines()
    {
    	return $this->hasMany(OrderLine::class)->orderBy('created_at', 'desc');
    }

    /**
     * Description
     *
     * @return void
     */
    public function currentorders()
    {
    	return $this->belongsToMany(CurrentOrder::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function notes()
    {
        return $this->hasMany(OrderNote::class)->orderBy('created_at', 'desc');
    }
    
}
