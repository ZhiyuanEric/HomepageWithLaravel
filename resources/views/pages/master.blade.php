<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>@yield('pagetitle')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    @yield('css')
    <style>
        body
        {
            background-image:url("images/background.jpg");
            background-repeat:no-repeat;
            background-position:center;
            background-attachment:fixed;
            background-size: auto 1080px;
        }

        h2
        {
            padding-top: 20px;
            width: 70%;
            margin: 0 auto;
        }


        #searchbar
        {
            text-align: center;
            width: 70%;
            height: auto;
            padding-bottom: 50px;
            padding-top: 50px;
            margin: 0 auto;
            max-width: 700px;

        }

        #enter{
            box-sizing: border-box;
            text-align:center;
            font-size:1.4em;
            height:2.7em;
            border-radius:4px;
            border:1px solid #c8cccf;
            color:#6a6f77;
            -web-kit-appearance:none;
            -moz-appearance: none;
            display:block;
            outline:0;
            padding:0 1em;
            text-decoration:none;
            width:100%;
        }

        #search {
            box-sizing: border-box;background-color: #cccccc;
            font-size:1.4em;
            height:2.7em;
            border-radius:4px;
            border:1px solid #c8cccf;
            color:#6a6f77;
            -web-kit-appearance:none;
            -moz-appearance: none;
            display:block;
            outline:0;
            padding:0 1em;
            text-decoration:none;
            width:100%;
        }

        select{
            background: url("http://ourjs.github.io/static/2015/arrow.png") no-repeat scroll right center transparent;
            background-color: #ffcccc;
            font-size:1.4em;
            height:3.7em;
            border:1px solid #c8cccf;
            color:#6a6f77;
            width:100%;
            text-align: center;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

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
            @yield('links')
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
    <div class="content">
        <h2 class="text-center">
            @yield('title')
        </h2>
        <div id="searchbar" class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <select id="Engine" class="text-center" style="height: 52.5px;">
                            <option value="GG">Google</option>
                            <option value="BD">Baidu</option>
                            <option value="BB">bilibili</option>
                            <option value="Weibo">Weibo</option>
                            <option value="Youtube">Youtube</option>
                            <option value="Zhihu">Zhihu</option>
                        </select>
                    </div>
                    <div class="col-sm-1 hidden-md hidden-lg">
                        <br>
                    </div>
                    <div class="col-md-9">
                        <input id="enter" type="text" class="input_control" list="browsers" name="searchInput">
                        <datalist id="choices">
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="col-md-1 hidden-md hidden-lg">
                <br>
            </div>
            <div class="col-md-3">
                <button type="button" id="search" class="" onclick="clickEnter()">Search</button>
            </div>
        </div>
    </div>
</body>
</html>
