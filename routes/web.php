<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



	Route::get('/', function () {
	    return view('auth.login');
	});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth', 'setOrderCounts']], function(){
	//COMPANY ROUTES
	Route::get('/companies', 'Companies\CompanyController@index')->name('companies.index');
	Route::post('/companies', 'Companies\CompanyController@store')->name('companies.store');
	Route::get('/companies/create', 'Companies\CompanyController@create')->name('companies.create');
	Route::get('/companies/{company}', 'Companies\CompanyController@edit')->name('companies.edit');

	//ORDER ROUTES
	Route::get('/orders/{order}/show', 'Orders\OrdersController@show')->name('orders.show');
	Route::get('/orders/create', 'Orders\OrdersController@create')->name('orders.create');
	Route::put('/orders/{order}/update', 'Orders\OrdersController@update')->name('orders.update');
	Route::post('/orders', 'Orders\OrdersController@store')->name('orders.store');

	//NEW
	Route::get('neworders/orders', 'Orders\NewOrdersController@index')->name('neworders.index');
	//ARTWORK
	Route::get('artwork/orders', 'Orders\ArtOrdersController@index')->name('artorders.index');
	//PRODUCTION
	Route::get('production/orders', 'Orders\ProductionOrdersController@index')->name('productionorders.index');
	//COMPLETE
	Route::get('complete/orders', 'Orders\CompleteOrdersController@index')->name('completeorders.index');
	//SHIPPED
	Route::get('shipped/orders', 'Orders\ShippedOrdersController@index')->name('shippedorders.index');
	//DELIVERED
	Route::get('delivered/orders', 'Orders\DeliveredOrdersController@index')->name('deliveredorders.index');

	//USER ROUTES
	Route::get('/user', 'User\UsersController@index')->name('users.index');
	Route::get('/user/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/user/profile', 'User\ProfileController@edit')->name('user.edit');
	Route::put('/user/profile/update', 'User\ProfileController@update')->name('user.update');
});
