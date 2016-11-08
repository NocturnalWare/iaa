@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-4 well" style="background-color: #fff">
		<center>
			<h3>Companies</h3>
			<a href="{{route('companies.index')}}">
				<button class="btn btn-lg btn-info" style="border-radius: 25px">
					{{count($companies)}}
				</button>
			</a>
		</center>
	</div>
	<div class="col-xs-12 col-md-4 well" style="background-color: #fff">
		<center>
			
			<h3>
				Current Order
			</h3>
			<div class="row">
				<a href="{{route('orders.show', $currentOrder->id)}}">
					<span style="font-size: 1.6em">{{$currentOrder->name}}</span>
				</a>
			</div>
		</center>
		<div class="col-xs-12">
			<div class="pull-left" style="font-size: 2em"><b>{{$currentOrder->company->name}}</b></div>
			<div class="pull-right {{Carbon::parse($currentOrder->hard_due)->format('m/d/Y') > Carbon::parse()->format('m/d/Y') ? 'text-success' : 'text-danger' }}"> 
				DUE<br>
				{{Carbon::parse($currentOrder->hard_due)->format('m/d/Y')}}
			</div>
		</div>
		<div class="col-xs-12">
			<h4>
				<div class="col-xs-6" style="padding:0px;">
					{{$currentOrder->lines()->sum('qty')}} Items
				</div>
				<div class="col-xs-6" style="padding:0px;">
					<span class=" pull-right">
						${{number_format($currentOrder->lines()->sum('line_price'), 2)}}
					</span>
				</div>
			</h4>
		</div>
		<button class="col-xs-12 btn btn-xs btn-info" data-toggle="collapse" data-target="#currentOrderPanel"><i class="fa fa-arrow-down"></i></button>

		<div id="currentOrderPanel" class="collapse col-xs-12">
			<hr />
			@foreach($currentOrder->lines()->distinct('line_text')->select('line_text')->get() as $line)
				<div class="row">
					{{$line->line_text}}
					<span class="pull-right">{{$currentOrder->lines()->where('line_text', $line->line_text)->sum('qty')}}</span>
				</div>
			@endforeach
			<hr />
			<div class="row">
				<h4>Notes</h4>
				@foreach($currentOrder->notes()->limit(3)->orderBy('updated_at', 'asc')->get() as $note)
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
									@foreach($note->comments as $comment)
										<div class="row">
											<div class="col-xs-12">
												{{$comment->user->profile->first_name}}
												{{$comment->user->profile->last_name}} <span style="font-size: .7em">{{Carbon::parse($comment->updated_at)->format('m/d/y h:i A')}}</span>
												<br>
												{{$comment->comment}}
											</div>
										</div>
									@endforeach
								</div>
							@endif
					</div>
				@endforeach
			</div>
		</div>
		
	</div>
	<div class="col-xs-12 col-md-4 well">
		<h3>Something</h3>
	</div>

@stop