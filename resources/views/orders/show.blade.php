@extends('layouts.app')


@section('content')
	<legend>
		<h2>
			{{$order->company->name}}
			<div class="col-md-6 col-xs-11 pull-right">
				@if($order->id === $currentOrder->id)
					<span class="bg-info">Current Order</span>
				@else
					<a href="{{route('orders.current.set', $order->id)}}">
						<button class="btn btn-primary">MAKE CURRENT ORDER</button>
					</a>
				@endif
			</div>
		</h2>
		<div class="col-xs-12 col-md-6">
			<span class="input-group">
				<label>Order Name</label>
				<input value="{{$order->company->name}}" class="form-control" name="order_name" placeholder="Order Name">
			</span>
			<span class="input-group">
				<label>Due</label>
				@if(\Carbon::parse($order->hard_due)->format('y-m-d') < \Carbon::parse()->format('y-m-d'))
					<span class="bg-warning text-danger pull-right" style="padding:6px;">Past Due</span>
				@endif
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
		<a target="_blank" href="{{route('ssactivewear.index')}}">
			<button class="btn btn-info">
				ADD S&S PRODUCT 
				<span style="font-size: .7em">(new tab)</span>
			</button>
		</a>
		@if(count($order->lines) > 0)
			<order-table :order="{{$order}}"></order-table>
		@else
			<div class="well">
				<h2>Order Not Started. Adds Products to Continue</h2>
			</div>
		@endif
	</div>
	@if(count($order->notes) > 0)
		<div class="col-xs-12 col-md-6" style="padding-top: 15px;">
			<h3>
				Notes
				<button class="btn btn-xs btn-primary">ADD</button>
			</h3>
			<div class="well" style="background-color: #fff">
				@foreach($order->notes()->limit(3)->orderBy('updated_at', 'asc')->get() as $note)
					<div class="well" style="background-color: #fff">
						{{$note->user->profile->first_name}}
						{{$note->user->profile->last_name}}
						<span class="pull-right">{{Carbon::parse($note->updated_at)->format('m/d/y h:i A')}}</span>
						<br>
						<b>{{$note->subject}}</b>
						<br>
						{{$note->message}}<br>
							@if(count($note->comments) > 0)
								<div class="row">
									<button class="btn btn-xs btn-info pull-right" data-toggle="collapse" data-target="#comments_{{$note->id}}">+{{count($note->comments)}} Comment(s)</button>
								</div>
								<div id="comments_{{$note->id}}" class="collapse">
									<hr />
									@foreach($note->comments as $comment)
										<div class="row">
											<div class="col-xs-11 col-xs-offset-1">
												{{$comment->user->profile->first_name}}
												{{$comment->user->profile->last_name}} <span style="font-size: .7em">{{Carbon::parse($comment->updated_at)->format('m/d/y h:i A')}}</span>
												<br>
												{{$comment->comment}}
											</div>
										</div>
									<hr />
									@endforeach
									<span class="input-group">
										<input class="form-control" placeholder="New Comment...">
										<span class="input-group-addon"><button class="btn btn-xs btn-info"><i class="fa fa-plus"></i></button></span>
									</span>
								</div>
							@endif
					</div>
				@endforeach
			</div>
		@endif
	</div>


@stop
