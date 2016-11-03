@extends('layouts.app')


@section('content')

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="well">
				<form action="{{route('companies.store')}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<span class="input-group col-xs-12 col-md-11">
						<label>Company Name</label>
						<input class="form-control" name="name" placeholder="Company Name">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Industry</label>
						<input class="form-control" name="industry" placeholder="Apparel, Events, etc.">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Phone</label>
						<input class="form-control" name="phone" placeholder="888-732-1281">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Email</label>
						<input class="form-control" name="email" placeholder="you@example.com" type="email">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Street Address</label>
						<input class="form-control" name="street_1" placeholder="111 Avenue Way">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Street Address 2</label>
						<input class="form-control" name="street_2" placeholder="Ste. 231">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>City</label>
						<input class="form-control" name="city" placeholder="Detroit">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>State</label>
						<input class="form-control" name="city" placeholder="MI">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Zip</label>
						<input class="form-control" name="zip" placeholder="48202">
					</span>
					<span class="input-group col-xs-12 col-md-11">
						<label>Country</label>
						<input class="form-control" name="country" placeholder="USA">
					</span>
					<div class="row">
						<div class="col-xs-12" style="padding-top:15px;">
							<button type="submit" class="btn btn-success pull-right" name="create"><i class="fa fa-check-circle-o"></i> SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop