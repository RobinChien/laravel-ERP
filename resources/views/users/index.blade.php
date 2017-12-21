@extends('layouts.app')



@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_email }}</td>
                <td>
                    @if(!empty($user->roles))
                        @foreach($user->roles as $v)
                            <label class="label label-success">{{ $v->display_name }}</label>
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    @if($user->user_status == 1)
                    <span class="text-navy">顯示</span>
                    @else
                    <span class="text-dnager">不顯示</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->user_id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->user_id) }}">Edit</a>
                    @permission('user-status')
                    @if($user->user_status == 0)
                    <a class="btn btn-success" href="{{ route('users.status',[1,$user->user_id]) }}">啟用</a>
                    @else
                    <a class="btn btn-warning" href="{{ route('users.status',[0,$user->user_id]) }}">禁用</a>
                    @endif
                    @endpermission
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->user_id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}

@endsection