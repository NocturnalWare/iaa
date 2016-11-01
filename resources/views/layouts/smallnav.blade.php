<li>
	<a href="{{route('dashboard')}}">
			Dashboard
	</a>
</li>
<li>
	<a href="{{route('neworders.index')}}">
		<span class="badge">{{count($neworders)}}</span>
		New Orders 
	</a>
</li>
<li>
	<a href="{{route('artorders.index')}}">
		<span class="badge">{{count($artorders)}}</span>
		Artwork
	</a>
</li>
<li>
	<a href="{{route('productionorders.index')}}">
		<span class="badge">{{count($productionorders)}}</span>
		Production
	</a>
</li>
<li>
	<a href="{{route('completeorders.index')}}">
		<span class="badge">{{count($completeorders)}}</span>
		Complete
	</a>
</li>
<li>
	<a href="{{route('shippedorders.index')}}">
		<span class="badge">{{count($shippedorders)}}</span>
		Shipped
	</a>
</li>
<li>
	<a href="{{route('deliveredorders.index')}}">
		<span class="badge">{{count($deliveredorders)}}</span>
		Delivered
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		Purchase Orders
	</a>
</li>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{route('user.edit')}}">
                My Profile
            </a>
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>