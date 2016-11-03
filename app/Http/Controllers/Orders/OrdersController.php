<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orders\Order;
use App\Orders\OrderUpdate;
use App\Orders\OrderStatus;
use App\Profiles\Company;
use App\Utilities\Utility;

class OrdersController extends Controller
{
	use Utility;
    /**
     * Description
     *
     * @return void
     */
    public function show(Order $order)    {
    	return view('orders.show', compact('order'));
    }
    
    /**
     * Description
     *
     * @return void
     */
    public function update(Order $order)
    {
    	$update = new OrderUpdate;
    	$update->user()->associate(\Auth::user());
    	$update->status()->associate(OrderStatus::find($order->status_id));
    	$order->updates()->save($update);

    	if($order->status_id < Order::DELIVERED){
    		$order->status_id += 1;
    	}

    	$order->save();

    	return redirect()->route('companies.edit', $order->company_id);
    }

    /**
     * Description
     *
     * @return void
     */
    public function create()
    {
    	$companies = [];
    	if($this->findGod() === true){
    		$companies = Company::all();
    	}

    	return view('orders.create', compact('companies'));
    }
    
    
}
