@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>共通代碼管理</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('commoncode.create') }}"> 新增共通代碼</a>
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
        <tr>
            <th>No</th>
            <th>代碼名稱</th>
            <th>父類別</th>
            <th>對應系統</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($commons as $key => $common)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $common->code_name }}</td>
                @if($common->parent_id=='#')
                    <td>#</td>
                @else
                    <td>{{ $common->parent->code_name }}</td>
                @endif
                <td>{{ $common->permission->display_name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('commoncode.show',$common->id) }}">顯示</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('commoncode.edit',$common->id) }}">編輯</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $commons->render() !!}
@endsection