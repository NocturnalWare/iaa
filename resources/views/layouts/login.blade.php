@extends('layouts.master')
@section('layout')
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container pull-right">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h3 class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">{{ config('app.name', 'INKADDICT') }}</h3>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            @include('layouts.smallnav')
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xs-12">
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{env('APP_URL')}}/js/app.js"></script>
    </body>
    </html>
@stop