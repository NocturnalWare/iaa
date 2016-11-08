<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders\Order;
use App\Orders\OrderNote;

class OrderNotesController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function store(Request $request, Order $order)
    {
    	$newnote = new OrderNote(['subject' => $request->get('subject'), 'message' => $request->get('message')]);
    	$newnote->user()->associate(\Auth::user());
    	$order->notes()->save($newnote);

    	return redirect()->back();
    }

    /**
     * Description
     *
     * @return void
     */
    public function update(Request $request)
    {
    	$note = OrderNote::find($request->get('note'));
    	$note->update(['subject' => $request->get('subject'), 'message' => $request->get('message')]);

    	return 200;
    }
    
}
