@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-3">
			<img class="img-responsive" style="max-height: 250px;" src="https://www.ssactivewear.com/{{$ss_product->color_front_image}}">
			<img class="img-responsive" style="max-height: 250px;" src="https://www.ssactivewear.com/{{$ss_product->color_side_image}}">
			<img class="img-responsive" style="max-height: 250px;" src="https://www.ssactivewear.com/{{$ss_product->color_back_image}}">
		</div>
		<div class="col-xs-12 col-md-8">
			<span style="font-size: 2.5em">{{$ss_product->brand_name}} {{$ss_product->style->title}}</span>
			<div class="row">
				{!! $ss_product->style->description !!}
			</div>
			<div class="col-xs-12">
				Style: <b>{{$ss_product->style->style_name}}</b>
			</div>
			<div class="col-xs-12">
				SKU: <b>{{$ss_product->external_sku}}</b>
			</div>
			<div class="col-xs-12">
				Color: 
				<i class="fa fa-square" style="color: {{$ss_product->color_1}}"></i>
				<i class="fa fa-square" style="color: {{$ss_product->color_2}}"></i>
				{{$ss_product->color_name}}
			</div>
			<div class="col-xs-12">
				<div class="col-xs-7 col-md-4" style="padding-top:10px;">
					<div class="row">
						Per Unit:
						<span class="pull-right">
							${{number_format($ss_product->piece_price, 2)}}
						</span>
					</div>
					<div class="row">
						Per 12:
						<span class="pull-right">
							${{number_format($ss_product->dozen_price, 2)}}
						</span>
					</div>
					<div class="row">
						Per {{$ss_product->case_qty}}: 
						<span class="pull-right">
							${{number_format($ss_product->case_price, 2)}}
						</span>
					</div>
					<div class="row bg-info" style="padding:10px;">
						IA Price:
						<span class="pull-right">
							${{number_format($ss_product->customer_price, 2)}}
						</span>
					</div>
				</div>
				<div class="col-xs-12 col-md-11" style="padding-top:10px;padding-left:0px;">
                    	<a href="{{route('order.products.add', [$ss_product->id])}}">
							<button class="btn btn-info">ADD TO CURRENT ORDER</button>
                    	</a>
					<button class="btn btn-info">CHOOSE ORDER</button>
				</div>
			</div>
		</div>
	</div>

@stop