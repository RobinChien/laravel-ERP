@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Management</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('customer.create') }}"> Create New Customer</a>
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
            <th>客戶編號</th>
            <th>名稱</th>
            <th>負責人</th>
            <th>聯絡人</th>
            <th>電話</th>
            <th>傳真</th>
            <th>Email</th>
            <th>郵遞區號</th>
            <th>地址</th>
            <th>統編</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($customers as $key => $customer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $customer->customer_code }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_owner }}</td>
                <td>{{ $customer->customer_liaison }}</td>
                <td>{{ $customer->customer_phone }}</td>
                <td>{{ $customer->customer_fax }}</td>
                <td>{{ $customer->customer_email }}</td>
                <td>{{ $customer->customer_ZipCode }}</td>
                <td>{{ $customer->customer_address }}</td>
                <td>{{ $customer->customer_GUInumber }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('customer.show',$customer->id) }}">Show</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('customer.edit',$customer->id) }}">Edit</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $customers->render() !!}
@endsection