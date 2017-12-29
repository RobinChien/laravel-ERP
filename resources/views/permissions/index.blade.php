@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
                {{--@permission('permission-create')--}}
                {{--<a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>--}}
                {{--@endpermission--}}
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr class="active">
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($permissions as $key => $permission)
            @if($permission->parent_id == '#')
                <tr class="bg-danger">
                    <td>{{ $permission->treeitem }}</td>
                    <td>{{ $permission->description }}</td>
                </tr>
            @else
                <tr>
                    <td>{{ $permission->treeitem }}</td>
                    <td>{{ $permission->description }}</td>
                    <td class="text-center">
                        @if($permission->status == 1)
                            <span class="text-navy">顯示</span>
                        @else
                            <span class="text-dnager">不顯示</span>
                        @endif
                    </td>
                    <td>
                        @permission('permission-show')
                        <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                        @endpermission
                        @permission('permission-edit')
                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                        @endpermission
                        @permission('permission-status')
                        @if($permission->status == 0)
                            <a class="btn btn-success"
                               href="{{ route('permissions.status',[1,$permission->id]) }}">啟用</a>
                        @else
                            <a class="btn btn-warning"
                               href="{{ route('permissions.status',[0,$permission->id]) }}">禁用</a>
                        @endif
                        @endpermission
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    {{--    {!! $permissions->render() !!}--}}
@endsection