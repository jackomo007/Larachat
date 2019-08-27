<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" rel="stylesheet">
    <style>
        .colorido{
            background: -moz-linear-gradient(45deg, rgba(255,0,0,1) 0%, rgba(5,193,255,1) 83%, rgba(0,0,0,1) 100%); /* ff3.6+ */
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(255,0,0,1)), color-stop(83%, rgba(5,193,255,1)), color-stop(100%, rgba(0,0,0,1))); /* safari4+,chrome */
            background: -webkit-linear-gradient(45deg, rgba(255,0,0,1) 0%, rgba(5,193,255,1) 83%, rgba(0,0,0,1) 100%); /* safari5.1+,chrome10+ */
            background: -o-linear-gradient(45deg, rgba(255,0,0,1) 0%, rgba(5,193,255,1) 83%, rgba(0,0,0,1) 100%); /* opera 11.10+ */
            background: -ms-linear-gradient(45deg, rgba(255,0,0,1) 0%, rgba(5,193,255,1) 83%, rgba(0,0,0,1) 100%); /* ie10+ */
            background: linear-gradient(45deg, rgba(255,0,0,1) 0%, rgba(5,193,255,1) 83%, rgba(0,0,0,1) 100%); /* w3c */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#FF0000',GradientType=1 ); /* ie6-9 */
        }
    </style>
    <script>
        window.App = <?= json_encode(['user' => auth()->user()]); ?>
    </script>
</head>
<body class="colorido">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
