<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class CurrentOrder extends Model
{
    protected $table = 'current_orders';

    protected $fillable = ['order_id', 'user_id'];
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
    	return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Description
     *
     * @return void
     */
    public static function getCurrentOrder()
    {
    	$CurrentOrder = CurrentOrder::where('user_id', \Auth::user()->id)->first();

    	return $CurrentOrder->order;
    }
    
    
}
