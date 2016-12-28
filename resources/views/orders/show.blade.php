@extends('layouts.app')


@section('content')
    <legend>
        <h2>
            {{$order->company->name}}
            <div class="col-md-6 col-xs-11 pull-right">
                <span v-if="isCurrentOrder" class="bg-info">Current Order</span>
                <a v-if="!isCurrentOrder" href="current/setAsCurrentOrder">
                    <button class="btn btn-primary">MAKE CURRENT ORDER</button>
					<button class="btn btn-primary"><i class="fa fa-upload"></i> ADD ARTWORK</button>
                </a>
            </div>
        </h2>
        <div class="col-xs-12 col-md-6">
            <span class="input-group">
                <label>Order Name</label>
                <input value="{{$order->company->name}}" class="form-control" name="order_name" placeholder="Order Name">
            </span>
            <span class="input-group">
                <label>Due</label>
                <span v-if="pastDue" class="bg-warning text-danger pull-right" style="padding:6px;">Past Due</span>
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
	<div class="row">
		<div class="col-xs-12 text-right">
		</div>
	</div>
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
