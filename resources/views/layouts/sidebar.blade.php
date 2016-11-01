<button class="btn col-xs-12 btn-primary">
	Dashboard
</button>
<button class="btn col-xs-12 btn-primary">
	<span class="badge">2</span>
	New Orders 
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">6</span>
	Artwork
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">11</span>
	Production
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">3</span>
	Complete
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">62</span>
	Shipped
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">9762</span>
	Delivered
</button>
	<button class="btn col-xs-12 btn-primary">
	<span class="badge">27</span>
	Purchase Orders
</button>
<button class="btn col-xs-12 btn-primary">
	Reports
</button>
@if(\App\Utilities\Utility::findGod() === true)
	<a href="{{route('users.index')}}">
		<button class="btn col-xs-12 btn-primary">
			Users
		</button>
	</a>
@endif