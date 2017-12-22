<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>ERP - @yield('title', config('app.name', 'Laravel'))</title>
    <meta name="keywords" content="{{ config('app.name', 'Laravel') }}">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">

    <!-- Styles -->
    {{--<link rel="shortcut icon" href="/favicon.ico">--}}
    {{--<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('admin/css/animate.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('admin/css/style.min.css')}}" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:auto">

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('company.index') }}">Company</a></li>
                        <li><a href="{{ route('customer.index') }}">Customer</a></li>
                        <li><a href="{{ route('manufacturer.index') }}">Manufacturer</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            {{--<div id="wrapper">--}}
                            {{--@include('vendor.flash.message')--}}
                            {{--@include('common._menu')--}}
                            {{--@include('common._wrapper')--}}
                            {{--</div>--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
@yield('content')
<!-- Scripts -->
{{--<script src="{{asset('/js/jquery.min.js')}}"></script>--}}
{{--<script src="{{asset('/admin/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{asset('/admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>--}}
{{--<script src="{{asset('/admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>--}}
{{--<script src="{{asset('/js/plugins/layer/layer.min.js')}}"></script>--}}
{{--<script src="{{asset('/admin/js/plugins/pace/pace.min.js')}}"></script>--}}
{{--<script src="{{asset('/admin/js/content.min.js')}}"></script>--}}
{{--<script src="{{asset('/js/dialog/artdialog.js')}}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')

<script>
    $(function () {
        $("#side-menu").metisMenu();
    })
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('footer-js')
</body>
</html>
