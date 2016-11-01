<?php

namespace App\Http\Middleware;

use Closure;
use App\Orders\Order;

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
        $orders = Order::where('status_id', Order::ORDERED)->get();
        view()->share('neworders', $orders);
        $orders = Order::where('status_id', Order::ARTWORK)->get();
        view()->share('artorders', $orders);
        $orders = Order::where('status_id', Order::PRODUCTION)->get();
        view()->share('productionorders', $orders);
        $orders = Order::where('status_id', Order::COMPLETE)->get();
        view()->share('completeorders', $orders);
        $orders = Order::where('status_id', Order::SHIPPED)->get();
        view()->share('shippedorders', $orders);
        $orders = Order::where('status_id', Order::DELIVERED)->get();
        view()->share('deliveredorders', $orders);

        return $next($request);
    }
}
