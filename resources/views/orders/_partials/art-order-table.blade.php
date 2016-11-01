<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Ordered</th>
			<th>Due By</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($company->orders()->where('status_id', \App\Orders\Order::ARTWORK)->get() as $order)
			<tr>
				<td>
					<a href="{{route('orders.show', $order->id)}}">{{$order->name}}</a>
				</td>
				<td>{{\Carbon::parse($order->created_at)->format('m/d/Y')}}</td>
				<td class="
					@if(\Carbon::parse($order->hard_due) < \Carbon::parse()) 
						text-danger
					@endif
					@if(\Carbon::parse($order->hard_due) > \Carbon::parse()) 
						text-success
					@endif"
				>{{\Carbon::parse($order->hard_due)->format('m/d/Y')}}</td>
				<td>
					<form action="{{route('orders.update', $order->id)}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="_method" value="PUT">
						<button type="submit" name="update_{{$order->id}}" class="btn btn-xs btn-info pull-right">
							<i class="fa fa-check-square-o"></i>
							Ready
						</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>