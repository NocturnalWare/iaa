@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-11">
		@foreach($companies as $company)
			<h3>
				<a href="{{route('companies.edit', $company->id)}}">{{$company->name}}</a>
				<button class="btn-info" style="border-radius: 25px;">NEW {{count($company->orders()->where('status_id', \App\Orders\Order::ORDERED)->get())}}</button>
				<button class="btn-info" style="border-radius: 25px;">ARTWORK {{count($company->orders()->where('status_id', \App\Orders\Order::ARTWORK)->get())}}</button>
				<button class="btn-info" style="border-radius: 25px;">PRODUCTION {{count($company->orders()->where('status_id', \App\Orders\Order::PRODUCTION)->get())}}</button>
				<button class="btn-info" style="border-radius: 25px;">COMPLETE {{count($company->orders()->where('status_id', \App\Orders\Order::COMPLETE)->get())}}</button>
				<button class="btn-info" style="border-radius: 25px;">SHIPPED {{count($company->orders()->where('status_id', \App\Orders\Order::SHIPPED)->get())}}</button>
				<button class="btn-info" style="border-radius: 25px;">DELIVERED {{count($company->orders()->where('status_id', \App\Orders\Order::DELIVERED)->get())}}</button>

			</h3>
		@endforeach
	</div>
</div>

@stop