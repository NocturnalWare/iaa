@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-4 well">
		<center>
			<h3>Companies</h3>
			<a href="{{route('companies.index')}}">
				<button class="btn btn-lg btn-info" style="border-radius: 25px">
					{{count($companies)}}
				</button>
			</a>
		</center>
	</div>
	<div class="col-xs-12 col-md-4 well">
		<h3>New Orders</h3>
	</div>
	<div class="col-xs-12 col-md-4 well">
		<h3>Something</h3>
	</div>

@stop