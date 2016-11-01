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
	    return view('welcome');
	});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
	//COMPANY ROUTES
	Route::get('/companies', 'Companies\CompanyController@index')->name('companies.index');
	Route::get('/companies/{company}', 'Companies\CompanyController@edit')->name('companies.edit');

	//ORDER ROUTES
	Route::get('/orders/{order}', 'Orders\OrdersController@show')->name('orders.show');
	Route::put('/orders/{order}/update', 'Orders\OrdersController@update')->name('orders.update');

	//USER ROUTES
	Route::get('/user', 'User\UsersController@index')->name('users.index');
	Route::get('/user/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/user/profile', 'User\ProfileController@edit')->name('user.edit');
	Route::put('/user/profile/update', 'User\ProfileController@update')->name('user.update');
});
