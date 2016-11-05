<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    //

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
    public function linePrice()
    {
    	return;
    }
    
    
}
