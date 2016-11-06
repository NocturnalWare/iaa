<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class CurrentOrder extends Model
{
    /**
     * Description
     *
     * @return void
     */
    public function user()
    {
    	return $this->belongsTo(App\User::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
}
