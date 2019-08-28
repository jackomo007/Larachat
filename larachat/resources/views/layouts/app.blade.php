<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="height: 100%;"
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
        .oscuro{
           background: #000428; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #000428, #004e92); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #000428, #004e92); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .colorido{
            background: #141e30; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #141e30, #243b55); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #141e30, #243b55); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .navegacion{
            text-decoration: none; color: cornsilk; 
            
            text-decoration: none;
        }

        .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
            background-color: inherit;
        }

        .nav > li > a:hover, .nav > li > a:focus {
            background-color: inherit;        
        }

        .dropdown-menu > li > a {
            color: lightblue;
        }

        .dropdown-menu > li > a > a:hover{
            color: lightblue;
        }
    </style>
    <script>
        window.App = <?= json_encode(['user' => auth()->user()]); ?>
    </script>
</head>
<body class="oscuro">
    <div id="app">
        <nav class="navbar navbar-static-top colorido">
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
                    <a class="navbar-brand" href="{{ url('/') }}" style="text-decoration: none; color: cornsilk;">
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-decoration: none; color: cornsilk;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background-color: inherit; color: cornsilk;">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-decoration: none;" class="colorido">
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
