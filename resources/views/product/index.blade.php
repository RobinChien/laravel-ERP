@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>商品資料</h2>
            </div>
            <div class="pull-right">
                @permission('product-create')
                <a class="btn btn-success" href="{{ route('product.create') }}">新增商品</a>
                @endpermission
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
            <th>編號</th>
            <th>名稱</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $key => $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->product_name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
                    @permission('product-edit')
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                    @endpermission
                    @permission('product_status')
                    @if($product->product_status == 0)
                        <a class="btn btn-success" href="{{ route('product.status',[1,$product->id]) }}">啟用</a>
                    @else
                        <a class="btn btn-warning" href="{{ route('product.status',[0,$product->id]) }}">禁用</a>
                    @endif
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->render() !!}
@endsection