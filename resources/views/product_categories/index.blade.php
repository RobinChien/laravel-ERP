@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>商品類別</h2>
            </div>
            <div class="pull-right">
                @permission('product_categories-create')
                <a class="btn btn-success" href="{{ route('product_categories.create') }}">新增商品類別</a>
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
        <tr class="active">
            <th>商品類別</th>
            <th width="280px">Action</th>
        </tr>
        @each('product_categories.child', $product_categories, 'category')
    </table>
    {{--    {!! $permissions->render() !!}--}}
@endsection