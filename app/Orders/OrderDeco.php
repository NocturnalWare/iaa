<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderDeco extends Model
{
    protected $table = 'order_line_decos';
    /**
     * Description
     *
     * @return void
     */
    public function line()
    {
    	return $this->belongsTo(Order::class);
    }
    
}
