@extends('layouts.app')

@section('content')

<div class="row">
	<legend>
		<h1>
			{{$company->name}}
			<a href="{{route('orders.create')}}">
				<button class="btn btn-primary">NEW ORDER</button>
			</a>
		</h1>
	</legend>
	<div class="col-xs-10">
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					New Orders 
					{{count($company->orders()->where('status_id', \App\Orders\Order::ORDERED)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.new-order-table', ['company' => $company])
		</div>
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					Artwork
					{{count($company->orders()->where('status_id', \App\Orders\Order::ARTWORK)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.art-order-table', ['company' => $company])
		</div>
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					Production
					{{count($company->orders()->where('status_id', \App\Orders\Order::PRODUCTION)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.production-order-table', ['company' => $company])
		</div>
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					Complete
					{{count($company->orders()->where('status_id', \App\Orders\Order::COMPLETE)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.complete-order-table', ['company' => $company])
		</div>
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					Shipped
					{{count($company->orders()->where('status_id', \App\Orders\Order::SHIPPED)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.shipped-order-table', ['company' => $company])
		</div>
		<div class="well">
			<h3>
				<button class="btn-info" style="border-radius: 25px;">
					Delivered
					{{count($company->orders()->where('status_id', \App\Orders\Order::DELIVERED)->get())}}
				</button>
			</h3>
			<hr />
			@include('orders._partials.delivered-order-table', ['company' => $company])
		</div>
	</div>
</div>

@stop