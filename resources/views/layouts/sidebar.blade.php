<a href="{{route('dashboard')}}">
	<button class="btn col-xs-12 btn-primary">
		Dashboard
	</button>
</a>
<a href="{{route('neworders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($neworders)}}</span>
		New Orders 
	</button>
</a>
<a href="{{route('artorders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($artorders)}}</span>
		Artwork
	</button>
</a>
<a href="{{route('productionorders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($productionorders)}}</span>
		Production
	</button>
</a>
<a href="{{route('completeorders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($completeorders)}}</span>
		Complete
	</button>
</a>
<a href="{{route('shippedorders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($shippedorders)}}</span>
		Shipped
	</button>
</a>
<a href="{{route('deliveredorders.index')}}">
	<button class="btn col-xs-12 btn-primary">
		<span class="badge">{{count($deliveredorders)}}</span>
		Delivered
	</button>
</a>
<a href="{{route('dashboard')}}">
	<button class="btn col-xs-12 btn-primary">
		Purchase Orders
	</button>
</a>
<a href="{{route('dashboard')}}">
	<button class="btn col-xs-12 btn-primary">
		Reports
	</button>
</a>
<a href="{{route('ssactivewear.index')}}">
	<button class="btn col-xs-12 btn-primary">
		S&S Activewear Catalog
	</button>
</a>
@if(\App\Utilities\Utility::findGod() === true)
	<a href="{{route('users.index')}}">
		<button class="btn col-xs-12 btn-primary">
			Users
		</button>
	</a>
@endif