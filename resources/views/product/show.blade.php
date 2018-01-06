@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>商品資料</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>商品編號:</strong>
                {{ $product->product_code }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>商品名稱:</strong>
                {{ $product->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>商品類別:</strong>
                {{$product->product_category->category_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>商品價格:</strong>
                {{$product->product_price}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>通用碼:</strong>
                {{$product->common_code->code_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>供應商:</strong>
                {{$product->manufacturer->manufacturer_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>商品狀態:</strong>
                @if($product->product_status == 1)
                    上架
                @else
                    下架
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>物料清單</strong>
        <table>
            <tr>
                <td>物料名稱</td>
                <td>數量</td>
            </tr>
            @each('product.child', $product_table, 'product_table')
        </table>
        </div>
    </div>
@endsection