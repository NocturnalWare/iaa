@extends('layouts.app')

@section('content')
			
	<div class="row">
		<div class="col-xs-8 well" id="profile-update-page">
			<h3>Profile Settings</h3>
			<div class="col-xs-12">
				<center>
					<form action="{{route('user.update')}}" method="POST" class="form-inline">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="_method" value="PUT">
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">First Name</label>
							<input class="form-control" name="first_name" value="{{$user->profile->first_name}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">Last Name</label>
							<input class="form-control" name="last_name" value="{{$user->profile->last_name}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">Street 1</label>
							<input class="form-control" name="street_1" value="{{$user->profile->street_1}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">Street 2</label>
							<input class="form-control" name="street_2" value="{{$user->profile->street_2}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">City</label>
							<input class="form-control" name="city" value="{{$user->profile->city}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">State</label>
							<input class="form-control" name="state" value="{{$user->profile->state}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">Zip</label>
							<input class="form-control" name="zip" value="{{$user->profile->zip}}">
						</span>
						<span class="input-group col-md-4 col-xs-12">
							<label class="pull-left">Country</label>
							<input class="form-control" name="zip" value="{{$user->profile->country}}">
						</span>
						<div class="col-xs-10" style="padding-top:15px;">
							<button class="btn btn-primary pull-right" type="submit" name="update">UPDATE</button>
						</div>
					</form>
				</center>
			</div>
		</div>

		<div class="col-md-5 well">
			<h3>
				<div class="col-xs-12 col-md-6">
					<b>{{$user->company->name}}</b> 
					<div class="row">
						<span style="font-size: .7em">{{$user->company->industry}} (<span style="font-size:.7em">{{$user->company->profile->country}}</span>)</span>
					</div>
					<div class="row">
						<span style="font-size: .5em">
							{{$user->company->profile->street_1}} {{$user->company->profile->street_2}}<br>
							{{$user->company->profile->city}}, {{$user->company->profile->state}} {{$user->company->profile->zip}}<br>
						</span>
					</div>
				</div>
				<div class="col-xs-12 col-md-6" style="font-size: .7em">
					<a class=" pull-right" href="tel:{{$user->company->profile->phone}}"> <i class="fa fa-phone"></i> {{$user->company->profile->phone}}</a><br>
					<a class=" pull-right" href="mailto:{{$user->company->profile->email}}"><i class="fa fa-envelope"></i> {{$user->company->profile->email}}</a><br>
				</div>
			</h3>
		</div>
	</div>


@stop