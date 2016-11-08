<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders\Order;

class CurrentOrdersController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function setAsCurrentOrder(Order $order)
    {
    	$currentOrder = \Auth::user()->currentOrder;
    	$currentOrder->order_id = $order->id;
    	$currentOrder->save();
    	return redirect()->back();
    }
    
}
