@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>進貨退出資料</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('purchase.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>退貨單號:</strong>
                {{ $purchase->purchases_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>供應商:</strong>
                {{$purchase->manufacturer->manufacturer_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>經辦人:</strong>
                {{ $purchase->user->user_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered" id="tableA">
                <tr>
                    <th width="100px">No</th>
                    <th>商品</th>
                    <th>數量</th>
                    <th>價錢</th>
                    <th>小計</th>
                </tr>
                @foreach ($details as $key => $detail)

                <tr >
                    <td width="100px" class="no">
                        {{$detail->purchase_detail_no}}
                    </td>
                    <td>
                        {{ $detail->product->product_name }}
                    </td>
                    <td>
                        {{$detail->purchase_qty}}
                    </td>
                    <td>
                        {{$detail->purchase_price}}
                    </td>
                    <td>
                        {{$detail->purchase_qty*$detail->purchase_price}}
                    </td>

                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>總計</td>
                    <td>{{$total}}</td>
                </tr>



            </table>

        </div>
    </div>

@endsection