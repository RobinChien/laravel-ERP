@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>退貨處理</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('sale_return.create') }}">新增銷貨退回單</a>
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
            <th>銷貨單號</th>
            <th>客戶</th>
            <th>經辦人</th>
            <th>日期</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sales as $key => $sale)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $sale->sales_no }}</td>
                <td>{{ $sale->customer->customer_name }}</td>
                <td>{{ $sale->user->user_name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('sale_return.show',$sale->id) }}">查看明細</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $sales->render() !!}
@endsection