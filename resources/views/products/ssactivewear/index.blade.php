@extends('layouts.app')

@section('content')
	@foreach($brands as $brand)
		<div class="row">
			<a href="{{route('ssactivewear.brand.productList', $brand->id)}}">{{$brand->name}}</a>
		</div>
	@endforeach

@stop