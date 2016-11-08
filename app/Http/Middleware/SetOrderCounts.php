<?php

namespace App\Http\Middleware;

use Closure;
use App\Orders\Order;
use App\Orders\CurrentOrder;
use Illuminate\Support\Collection;

class SetOrderCounts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $orders = [];
        $orders['neworders'] = [];
        $orders['artorders'] = [];
        $orders['productionorders'] = [];
        $orders['completeorders'] = [];
        $orders['shippedorders'] = [];
        $orders['deliveredorders'] = [];

        foreach(Order::all() as $order){
            if($order->status_id == Order::ORDERED){
                $orders['neworders'][] = $order;
            }
            if($order->status_id == Order::ARTWORK){
                $orders['artorders'][] = $order;
            }
            if($order->status_id == Order::PRODUCTION){
                $orders['productionorders'][] = $order;
            }
            if($order->status_id == Order::COMPLETE){
                $orders['completeorders'][] = $order;
            }
            if($order->status_id == Order::SHIPPED){
                $orders['shippedorders'][] = $order;
            }
            if($order->status_id == Order::DELIVERED){
                $orders['deliveredorders'][] = $order;
            }
        };

        $currentOrder = CurrentOrder::where('user_id', \Auth::user()->id)->first();

        view()->share([
            'currentOrder' => $currentOrder->order()->with('lines', 'company')->first(),
            'neworders' => $orders['neworders'],
            'artorders' => $orders['artorders'],
            'productionorders' => $orders['productionorders'],
            'completeorders' => $orders['completeorders'],
            'shippedorders' => $orders['shippedorders'],
            'deliveredorders' => $orders['deliveredorders'],
        ]);

        \JavaScript::put(['neworders' => $orders, 'orders' => $orders, 'currentOrder' => $currentOrder->order]);


        return $next($request);
    }
}
