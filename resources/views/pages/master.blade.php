<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <title>@yield('pagetitle')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        @yield('css')
        body
        {
            background-image:url("{{ asset('images/background.jpg') }}");
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

        #EB
        {
            float: right;
            position: absolute;
            right: 50px;
            width: 30px;
            height: 30px;
            font-size: 15px;
            background-color: rgba(0, 0, 0, 0);
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-clip: border-box;
            background-origin: padding-box;
            background-position-x: 0px;
            background-position-y: -51px;
            background-size: auto auto;
        }

        .save
        {
            float: right;
            right: 36%;
            width: 30px;
            height: 30px;
            font-size: 15px;
            background-color: rgba(0, 0, 0, 0);
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-clip: border-box;
            background-origin: padding-box;
            background-position-x: 0px;
            background-position-y: -51px;
            background-size: auto auto;
        }


        #controlEdit
        {
            box-sizing: border-box;
            background-color: #ffcccc;
            font-size:1.4em;
            height:2.7em;
            border-radius:4px;
            border:1px solid #c8cccf;
            color:#6a6f77;
            -web-kit-appearance:none;
            -moz-appearance: none;
            text-decoration:none;
        }

        .oneSite
        {

            display: inline-block;
            text-align:center;
            margin: auto;
            width: 200px;
            height: 150px;
            list-style-type: none;


        }

        .sites
        {
            position:relative;
            top:10%;
            text-align: center;
            font-size: 20px;
            margin: auto;

        }

        .websitesSet
        {

            padding:0;
            margin:0;
        }

        .sites:link, .sites:visited {
            color: #E83015;
            text-decoration: none;
        }

        .sites:hover {
            text-decoration: none;
        }

        .newSite{
            background: #D0EEFF;
            box-sizing: border-box;
            color: #1E88C7;
            line-height: 30px;
            text-indent: 0;

            overflow: hidden;
            padding: 5px 12px;
            border-radius: 4px;
            border: 1px solid #99D3F5;
        }

        .formatForm {
            display: block;
        }

        .edit
        {
            position: relative;
            margin: auto auto;
            background-color: #7DB9DE;
            border:1px solid #c8cccf;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 50%;
            min-width: 250px;
            max-width: 350px;
            height: 300px;
            z-index:1001;
        }

        .file {
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 30px;
            position:relative;
        }
        .file input {
            position: absolute;
            right: 0;
            top: 0;
            opacity: 0;
        }
        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }

        .newsite:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }


        option{
            background-color: #ffffff;
            text-align: center;
        }

        input:focus{
            border:1px solid #ff7496;
        }

        ::-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: #6a6f77;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: #6a6f77;
        }
        input::-webkit-input-placeholder{
            color: #6a6f77;
        }

        li:hover {
            background-color: #7DB9DE;
            box-shadow: 0px 2px 12px rgba(81, 168, 221, 1), inset 0px 0px 0px 2px rgba(255, 255, 255, 0.07);
        }

        #websites
        {
            text-align: center;
            position: relative;
            padding-top: 30px;
            padding-bottom: 30px;
            width: 70%;
            margin: 0 auto;
            background: rgba(255,255,255,.6);
            max-width: 1000px;
            line-height: 60px;
        }
        #addtype{
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

        #testbtn1
        {
            position: absolute;
            margin:auto auto;
            right: 5%;
            bottom: 10%;
            z-index: 1000;
        }

        #testbtn2
        {
            position: absolute;
            margin:auto auto;
            right: 5%;
            bottom: 5%;
            z-index: 1000;
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
            <li class="active"><a href="/users">Users</a></li>
            @yield('links')
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/users/create"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
</html>
