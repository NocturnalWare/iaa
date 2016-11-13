@extends('layouts.app')

@section('content')
			<a href="{{route('orders.create')}}">
				<button class="btn btn-primary">NEW ORDER</button>
			</a>
	<div class="row">
		<table class="table table-striped">
			@foreach($orders as $order)
				<tr>
					<td><a href="{{route('orders.show', $order->id)}}">{{$order->name}}</a></td>
					<td>{{$order->company->name}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@stop