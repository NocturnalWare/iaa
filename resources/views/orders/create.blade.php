@extends('layouts.app')

@section('content')

	<div class="row">
		<legend>
			<h3>New Order</h3>
		</legend>
		<form action="{{route('orders.store')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-6">
						<span class="input-group">
							<label>Order Name</label>
							<input name="name" class="form-control" placeholder="Name the order">
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<span class="input-group">
							<label>Company</label>
							<select name="company_id" class="form-control">
								@foreach($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach
							</select>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<span class="input-group">
							<label>Due Date</label><br>
							<input name="hard_due" class="from-control"  type="date">
						</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12" style="padding-top: 15px;">
				<button type="submit" class="btn btn-primary">START NEW ORDER</button>
			</div>
		</form>
	</div>
@stop