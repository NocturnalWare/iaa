<?php

use Illuminate\Database\Seeder;
use App\Utilities\OrderStatuses;
use App\Profiles\Company;
use App\Orders\OrderStatus;
use App\Orders\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(OrderStatuses::statuses() as $status){
        	OrderStatus::create(['name' => $status]);
        }
        $company = Company::find(1);
        factory(Order::class, 40)->make()->each(function($order) use ($company){
        	$order->status()->associate(OrderStatus::find(rand(1,6)));
        	$company->orders()->save($order);
        });
    }
}
