<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <title>@yield('pagetitle')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('script')
    <style>
        @yield('css')
    </style>
</head>
<body>
<nav class="navbar" style="max-width: 1080px; margin: auto;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="active"><a href="/users/alluser">Users</a></li>
            @yield('links')
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::user() === null)
                <li><a href="/users/create"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @else
                <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> log out</a></li>
            @endif
        </ul>
    </div>
</nav>
    <div class="content">
        <h2 class="text-center">
            @yield('title')
        </h2>
        @yield('search')
        <div id="websites">
            @yield('websites')
        </div>
    </div>
</body>
<footer>
    @yield('footer')
</footer>
</html>
