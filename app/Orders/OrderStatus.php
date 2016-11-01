<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    /**
     * Description
     *
     * @return void
     */
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function orderupdates()
    {
    	return $this->hasMany(OrderUpdate::class);
    }
    
}
