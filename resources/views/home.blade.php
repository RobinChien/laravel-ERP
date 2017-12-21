@extends('layouts.app')

@section('content')
    @inject('details','App\Services\NameAndRole')
    {{--<a>{{ $details->user_id}}</a>--}}
{{--    <a>{{ $details->user_name}}</a>--}}
    {{--@foreach($details->menu_parent as $key =>$rule)--}}
        {{--<a>{{ $rule->pluck('name')}}</a>--}}
    {{--@endforeach--}}
    {{--<a>{{$details->permission}}</a>--}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
