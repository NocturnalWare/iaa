<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orders\Order;

class OrdersController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function show(Order $order)    {
    	return view('orders.show', compact('order'));
    }
    
}
