@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manufacturer Management</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('manufacturer.create') }}"> Create New Manufacturer</a>
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
            <th>廠商編號</th>
            <th>名稱</th>
            <th>負責人</th>
            <th>聯絡人</th>
            <th>電話</th>
            <th>傳真</th>
            <th>Email</th>
            <th>郵遞區號</th>
            <th>地址</th>
            <th>統一編號</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($manufacturers as $key => $manufacturer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $manufacturer->manufacturer_code }}</td>
                <td>{{ $manufacturer->manufacturer_name }}</td>
                <td>{{ $manufacturer->manufacturer_owner }}</td>
                <td>{{ $manufacturer->manufacturer_liaison }}</td>
                <td>{{ $manufacturer->manufacturer_phone }}</td>
                <td>{{ $manufacturer->manufacturer_fax }}</td>
                <td>{{ $manufacturer->manufacturer_email }}</td>
                <td>{{ $manufacturer->manufacturer_ZipCode }}</td>
                <td>{{ $manufacturer->manufacturer_address }}</td>
                <td>{{ $manufacturer->manufacturer_GUInumber }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('manufacturer.show',$manufacturer->id) }}">Show</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('manufacturer.edit',$manufacturer->id) }}">Edit</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $manufacturers->render() !!}
@endsection