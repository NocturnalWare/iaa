@extends('layouts.app')

@section('content')

	<div class="row well">
		@foreach($brands as $brand)
			<div class="col-xs-3">
				<a href="{{route('ssactivewear.brand.styles', $brand->id)}}">{{$brand->name}}</a>
			</div>
		@endforeach
	</div>
	<div class="row">
		<center>
			@foreach($categories as $category)
				<a href="{{route('ssactivewear.category.styles', $category->id)}}">
					<div class="col-xs-3 well">
						<h3>{{$category->name}}</h3>
						<img src="{{$category->imageURL()}}" style="max-height:280px;" class="img-responsive">
					</div>
				</a>
			@endforeach
		</center>
	</div>
@stop