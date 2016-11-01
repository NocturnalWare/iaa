<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orders\Order;

class ShippedOrdersController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	$orders = Order::where('status_id', Order::SHIPPED)->get();
    	
    	return view('orders.show.index', compact('orders'));
    }
}
