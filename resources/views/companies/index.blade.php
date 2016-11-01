@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-11">
		@foreach($companies as $company)
			<h3>{{$company->name}} <i class="fa fa-pencil pull-right"></i></h3>
		@endforeach
	</div>
</div>

@stop