@extends('layouts.app')


@section('content')
	
	
	<div class="row">
		<legend>
			<h2>
				{{$ss_brand->name}}
			</h2>
		</legend>
		<div class="col-xs-12 col-md-11">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Products</th>
					</tr>
				</thead>
				<tbody>
					@foreach($styles as $style)
						<tr>
							<td>
								{{$style->title}}<br>
								{{$style->base_category}}<br>
								<img class="img-responsive" style="max-height: 250px;" src="https://www.ssactivewear.com/{{$style->style_image}}">
							</td>
							<td>{!! html_entity_decode($style->description) !!}</td>
							<td>
							<button data-toggle="collapse" data-target="#style_{{$style->id}}">Show <span class="badge">{{count($style->products)}}</span></button>
							<div id="style_{{$style->id}}" class="collapse">
								@foreach($style->products as $product)
								<div class="well well-sm">
									{{$product->size_name}}
									<i class="fa fa-square" style="color: {{$product->color_1}}"></i>
									<i class="fa fa-square" style="color: {{$product->color_2}}"></i>
									{{$product->color_name}} : {{$product->customer_price}}
									<a href="{{route('ssactivewear.products.show', $product->id)}}">
										<button class="btn btn-xs">
											VIEW
										</button>
									</a>
								</div>
								@endforeach
								</div>
							</td>
						</tr>
					@endforeach	
				</tbody>
			</table>
		</div>
	</div>
@stop