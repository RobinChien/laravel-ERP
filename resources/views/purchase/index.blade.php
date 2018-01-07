@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>進貨維護</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('purchase.create') }}">新增進貨單</a>
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
            <th>進貨單號</th>
            <th>廠商</th>
            <th>經辦人</th>
            <th>日期</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($purchases as $key => $purchase)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $purchase->purchases_no }}</td>
                <td>{{ $purchase->manufacturer->manufacturer_name }}</td>
                <td>{{ $purchase->user->user_name }}</td>
                <td>{{ $purchase->created_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('purchase.show',$purchase->id) }}">查看明細</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $purchases->render() !!}
@endsection