<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orders\Order;
use App\Orders\CurrentOrder;
use App\Orders\OrderUpdate;
use App\Orders\OrderStatus;
use App\Orders\OrderLine;
use App\Orders\OrderBase;
use App\Profiles\Company;
use App\SSActivewear\SSActivewearProduct;
use App\SSActivewear\SSActivewearBase;
use App\Utilities\Utility;

class OrdersController extends Controller
{
	use Utility;
    /**
     * Description
     *
     * @return void
     */
    public function show(Order $order)
    {
        // foreach($search->index as $product){
        //     if($search->color_name == $product->base->color_name){
        //         $sizes[] = $product;
        //     }
        // };

        \JavaScript::put([
            'user' => \Auth::user(),
            'order' => $order,
        ]);
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
    public function store(Request $request)
    {
        $company = Company::find($request->get('company_id'));
        $order = $company->orders()->save(new Order($request->only(['name', 'hard_due'])));

        return redirect()->route('orders.show', $order->id);
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
    
    /**
     * Description
     *
     * @return void
     */
    public function addLine(Request $request, Order $order)
    {
        $injection = $request->get('line');
        $line = new OrderLine;
        $line->blank_name = $injection['blank_name'];
        $line->blank_colors = $injection['blank_colors'];
        $line->design_name = $injection['design_name'];
        $line->screen_count = 0;

        return $order->lines()->save($line);
    }

    /**
     * Description
     *
     * @return void
     */
    public function addProductToOrder(SSActivewearBase $base)
    {

        $currentOrder = CurrentOrder::getCurrentOrder();
        $newOrder = new OrderBase;
    	$newOrder->order()->associate($currentOrder);
        $newLine = new OrderLine;
        $newLine->base()->associate($base);
        $newOrder->order->lines()->save($newLine);
        $newOrder->save();


    	return redirect()->back();
    }
    
    /**
     * Description
     *
     * @return void
     */
    public function destroyLine(OrderLine $order_line)
    {   
        $order_line->delete();
        return redirect()->back();
    }

    /**
     * Description
     *
     * @return void
     */
    public function removeBase(Request $request)
    {	
        $base = OrderBase::find($request->get('base'));
        $base->delete();
    	return 200;
    }
    
    
    
}
