<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Ordered</th>
			<th>Due By</th>
		</tr>
	</thead>
	<tbody>
	@foreach($company->orders()->where('status_id', \App\Orders\Order::SHIPPED)->get() as $order)
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
			</tr>
		@endforeach
	</tbody>
</table>