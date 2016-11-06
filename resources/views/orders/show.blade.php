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
		@if(count($order->lines) > 0)
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Line Text</th>
						<th>Sizes</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order->lines as $line)
						<tr>
							<td>
								{{$line->line_text}}
							</td>	
							<td>
								{{$line->otherSizes()[0]}}
								@if(in_array('XS', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, 'XS'])}}">
		                        		<button class="btn" style="border-radius:25">XS</button>
			                    	</a>
		                        @endif
								@if(in_array('S', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, 'S'])}}">
			                    		<button class="btn" style="border-radius:25">S</button>
			                    	</a>
		                        @endif
								@if(!in_array('M', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, 'M'])}}">
			                    		<button class="btn" style="border-radius:25">M</button>
			                    	</a>
		                        @endif
								@if(in_array('L', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, 'L'])}}">
			                    		<button class="btn" style="border-radius:25">L</button>
			                    	</a>
		                        @endif
								@if(in_array('XL', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, 'XL'])}}">
			                    		<button class="btn" style="border-radius:25">XL</button>
			                    	</a>
		                        @endif
								@if(in_array('2XL', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, '2XL'])}}">
			                    		<button class="btn" style="border-radius:25">2XL</button>
			                    	</a>
		                        @endif
								@if(in_array('3XL', $line->otherSizes()))
			                    	<a href="{{route('order.products.add', [$order->id, $line->product, '3XL'])}}">
			                    		<button class="btn" style="border-radius:25">3XL</button>
			                    	</a>
		                        @endif
							</td>	
						</tr>
					@endforeach
				</tbody>
			</table>
			<button class="btn btn-success pull-right">
				<i class="fa fa-check"></i>
				SAVE
			</button>
		@else
			<div class="well">
				<h2>Order Not Started. Adds Products to Continue</h2>
			</div>
		@endif
	</div>


@stop
