<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderUpdate extends Model
{
    /**
     * Description
     *
     * @return void
     */
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

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
    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
    
}
