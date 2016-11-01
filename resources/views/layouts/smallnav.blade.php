<li>
	<a href="{{route('dashboard')}}">
		Dashboard
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">2</span>
		New Orders 
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">	
		<span class="badge">6</span>
		Artwork
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">11</span>
		Production
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">3</span>
		Complete
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">62</span>
		Shipped
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">9762</span>
		Delivered
	</a>
</li>
<li>
	<a href="{{route('dashboard')}}">
		<span class="badge">27</span>
		Purchase Orders
	</a>
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