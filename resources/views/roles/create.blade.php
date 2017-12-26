@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Display Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                <ul id="tree">
                    @foreach($permission as $value)
                        @if($value->status != 0)
                            <li>
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>
                                @foreach($value->children as $subvalue)
                                    <ul>
                                        <li>
                                            <label>{{ Form::checkbox('permission[]', $subvalue->id, false, array('class' => 'name')) }}
                                                {{ $subvalue->display_name }}</label>
                                            <ul>
                                                <li>
                                                    @foreach($subvalue->children as $basevalue)
                                                        <label>{{ Form::checkbox('permission[]', $basevalue->id, false, array('class' => 'name')) }}
                                                            {{ $basevalue->display_name }}</label>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@stop

@section('js')
    <script src={{ asset('js/checkbox.js') }}></script>
    <script>
        $('#tree').checktree();
    </script>

@endsection