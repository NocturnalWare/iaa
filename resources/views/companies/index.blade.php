@extends('layouts.app')

@section('content')
<legend class="col-xs-12">
	<h2>Companies
	<a href="{{route('companies.create')}}">
		<button class="btn btn-sm btn-primary pull-right">NEW COMPANY</button>
	</a>
	</h2>
	
</legend>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Company</th>
					<th>NEW</th>
					<th>ARTWORK</th>
					<th>PRODUCTION</th>
					<th>COMPLETE</th>
					<th>SHIPPED</th>
					<th>DELIVERED</th>
				</tr>
			</thead>
			<tbody>
				@foreach($companies as $company)
					<tr>
						<td><a href="{{route('companies.edit', $company->id)}}">{{$company->name}}</a></td>

						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::ORDERED)->get())}}</td>
						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::ARTWORK)->get())}}</td>
						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::PRODUCTION)->get())}}</td>
						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::COMPLETE)->get())}}</td>
						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::SHIPPED)->get())}}</td>
						<td>{{count($company->orders()->where('status_id', \App\Orders\Order::DELIVERED)->get())}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop