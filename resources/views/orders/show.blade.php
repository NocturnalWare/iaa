@extends('layouts.app')


@section('content')

	<order-table :order="{{$order}}"></order-table>
	<div class="col-xs-12 col-md-6" style="padding-top: 15px;">
		<h3>
			Notes
			<button class="btn btn-xs btn-primary" data-toggle="collapse" data-target="#addNote">ADD</button>
		</h3>
		<div class="well collapse" style="background-color: #fff" id="addNote">
			<form action="{{route('order.notes.store', $order->id)}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input class="form-control" placeholder="Subject" name="subject">
				<textarea class="form-control" placeholder="Note" name="message"></textarea>
				<button class="btn btn-xs btn-success pull-right">SAVE</button>
			</form>
		</div>
		<div class="well" style="background-color: #fff">
			@foreach($order->notes()->orderBy('updated_at', 'asc')->get() as $note)
				<note-block note-id="{{$note->id}}"></note-block> 
			@endforeach
		</div>
	</div>


@stop
