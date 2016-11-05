@extends('layouts.app')

@section('content')

	@foreach($results as $result)
		<div class="row">
			{{$result->brandName}} {{$result->colorName}} {{$result->styleName}}
		</div>
	@endforeach

@stop