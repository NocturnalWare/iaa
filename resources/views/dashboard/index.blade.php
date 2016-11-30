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
		<button class="col-xs-12 btn btn-xs btn-info" data-toggle="collapse" data-target="#currentOrderPanel"><i class="fa fa-arrow-down"></i></button>

		<div id="currentOrderPanel" class="collapse col-xs-12">
		</div>
		
	</div>
	<div class="col-xs-12 col-md-4 well">
		<h3>Something</h3>
	</div>

@stop