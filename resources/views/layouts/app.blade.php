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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    @yield('css')

</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:auto">
@inject('menus','App\Services\Menu')
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
                    @guest
                        @else
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('/home') }}">Home</a></li>

                                @foreach($menus->parent_menus as $parent_menu)
                                    @if($menus->sub_menus->count()>0)
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                {{$parent_menu->display_name}}
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($menus->sub_menus as $submenu)
                                                    @if($submenu->parent_id == $parent_menu->id)
                                                        <li>
                                                            <a href="{{route($submenu->route)}}">{{$submenu->display_name}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach

                                {{--<li><a href="{{ route('users.index') }}">Users</a></li>--}}
                                {{--<li><a href="{{ route('roles.index') }}">Roles</a></li>--}}
                                {{--<li><a href="{{ route('permissions.index') }}">Permissions</a></li>--}}
                                {{--<li><a href="{{ route('company.index') }}">Company</a></li>--}}
                                {{--<li><a href="{{ route('customer.index') }}">Customer</a></li>--}}
                                {{--<li><a href="{{ route('manufacturer.index') }}">Manufacturer</a></li>--}}
                            </ul>
                        @endguest

                        <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @else
                                        {{--<div id="wrapper">--}}
                                        {{--@include('vendor.flash.message')--}}
                                        {{--                            @include('common._menu')--}}
                                        {{--@include('common._wrapper')--}}
                                        {{--</div>--}}
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false" aria-haspopup="true">
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
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')

{{--<script>--}}
{{--$(function () {--}}
{{--$("#side-menu").metisMenu();--}}
{{--})--}}
{{--$('div.alert').not('.alert-important').delay(3000).fadeOut(350);--}}
{{--</script>--}}
{{--@yield('footer-js')--}}
</body>
</html>
