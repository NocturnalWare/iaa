@extends('layouts.app')

@section('content')

	<div class="row">
		<table class="table table-striped">
			@foreach($orders as $order)
				<tr>
					<td>{{$order->name}}</td>
					<td>{{$order->company->name}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@stop