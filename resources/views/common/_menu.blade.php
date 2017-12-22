@inject('details','App\Services\NameAndRole')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header text-center">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{$details->user_name}}</strong>
                                </span>
                                    <span class="text-muted text-xs block">
                                        @foreach($details->role as $key => $value)
                                            {{$value->name}}
                                        @endforeach
                                        <b class="caret"></b>
                                    </span>
                                </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="J_menuItem" href="form_avatar.html">修改密碼</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}">安全退出</a></li>
                    </ul>
                </div>
            </li>

            @foreach($details->menu_parent as $key => $rule)
                {{--@if($rule->parent_id == '#')--}}
                <li class="dropdown">
                    <a title="{{$rule->pluck('name')[0]}}" target="_blank">
                        {{--<i class="fa fa-{{$rule['fonts']}}"></i>--}}
                        <span class="nav-label">{{$rule->pluck('display_name')[0]}}</span>
                    </a>
                    {{--                        @if(isset($rule['children']))--}}
                    <ul class="nav nav-second-level collapse ">
                        @foreach($details->menu_child as $k=>$item)
                            @if($item->pluck('parent_id')[0] == $rule->pluck('id')[0])
                                <li>
                                    <a class="J_menuItem" href="{{ route($item->pluck('route')[0]) }}"
                                       data-index="{{$item->pluck('id')[0]}}">{{$item->pluck('display_name')[0]}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                {{--@endif--}}
                <li>
                {{--@else--}}
                {{--<li>--}}
                {{--<a title="{{$rule->pluck('name')[0]}}">--}}
                {{--<span class="nav-label">{{$rule->pluck('display_name')[0]}}</span>--}}
                {{--<span class="fa arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="nav nav-second-level collapse">--}}
                {{--@foreach($details->menu_child as $k=>$item)--}}
                {{--@if($item->pluck('parent_id')[0] == $rule->pluck('id')[0])--}}
                {{--<li><a class="J_menuItem" href="{{ route($item->pluck('route')[0]) }}" data-index="index_v1.html">{{$item->pluck('display_name')[0]}}</a></li>--}}
                {{--@endif--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--@endif--}}
                {{--<li>--}}
            @endforeach
        </ul>
    </div>
</nav>