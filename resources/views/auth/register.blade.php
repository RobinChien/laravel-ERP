@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                <label for="user_name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" required autofocus>

                                    @if ($errors->has('user_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_birth') ? ' has-error' : '' }}">
                                <label for="user_birth" class="col-md-4 control-label">Birth</label>

                                <div class="col-md-6">
                                    <input id="user_birth" type="date" class="form-control" name="user_birth" required>

                                    @if ($errors->has('user_birth'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_birth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }}">
                                <label for="user_email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="user_email" type="email" class="form-control" name="user_email" value="{{ old('user_email') }}" required>

                                    @if ($errors->has('user_email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_addr') ? ' has-error' : '' }}">
                                <label for="user_addr" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="user_addr" type="text" class="form-control" name="user_addr" required>

                                    @if ($errors->has('user_addr'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_addr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user_phone') ? ' has-error' : '' }}">
                                <label for="user_phone" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <input id="user_phone" type="text" class="form-control" name="user_phone" required>

                                    @if ($errors->has('user_phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="user_status" {{ old('user_status') ? 'checked' : '' }}> 開通帳號
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
