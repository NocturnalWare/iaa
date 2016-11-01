@extends('layouts.app')

@section('content')
	
	@foreach($users as $user)
		<div class="row" data-toggle="collapse" href="#history_{{$user->id}}" aria-expanded="false" aria-controls="history_{{$user->id}}">
			{{$user->name}}
			<hr />
			<div class="collapse" id="history_{{$user->id}}">
				<table class="table table-striped">
					@foreach($user->orderupdates as $update)
						<tr>
							<td>Moved 
								<a href="{{route('orders.show', $update->order->id)}}">{{$update->order->name}}</a> to {{$update->status->name}}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	@endforeach

@stop