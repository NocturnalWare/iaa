@extends('layouts.app')


@section('content')
	<legend>
		<h3>{{$order->company->name}}</h3>
		<div class="col-xs-12 col-md-6">
			<span class="input-group">
				<label>Order Name</label>
				<input value="{{$order->company->name}}" class="form-control" name="order_name" placeholder="Order Name">
			</span>
			<span class="input-group">
				<label>Due</label>
				<input type="date" value="{{\Carbon::parse($order->hard_due)->format('Y-m-d')}}" class="form-control" name="hard_due">
			</span>
		</div>
		<div class="col-xs-12 col-md-6">
			<label>Address</label>
			<p>
				{{$order->company->profile->street_1}}
				{{$order->company->profile->street_2}}
				<br>
				{{$order->company->profile->city}}
				{{$order->company->profile->state}},
				{{$order->company->profile->zip}}
				<br>
				{{$order->company->profile->country}}
			</p>
		</div>
	</legend>
	<div class="col-xs-12 col-md-11" style="padding-top: 15px;">
		<button class="btn btn-info">ADD MANUAL PRODUCT</button>
		<a target="_blank" href="">
			<button class="btn btn-info">
				ADD S&S PRODUCT 
				<span style="font-size: .7em">(new tab)</span>
			</button>
		</a>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Line Text</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->lines as $line)
					<tr>
						<td>
							{{$line->line_text}}
						</td>	
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


@stop
