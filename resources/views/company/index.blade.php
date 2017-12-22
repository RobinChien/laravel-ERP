@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company Management</h2>
            </div>
            <div class="pull-right">
                @permission('company-create')
                <a class="btn btn-success" href="{{ route('company.create') }}"> Create New Company</a>
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
            <th>代碼</th>
            <th>名稱</th>
            <th>負責人</th>
            <th>電話</th>
            <th>傳真</th>
            <th>Email</th>
            <th>網址</th>
            <th>郵遞區號</th>
            <th>地址</th>
            <th>統編</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($companys as $key => $company)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $company->company_code }}</td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->company_owner }}</td>
                <td>{{ $company->company_phone }}</td>
                <td>{{ $company->company_fax }}</td>
                <td>{{ $company->company_email }}</td>
                <td>{{ $company->company_url }}</td>
                <td>{{ $company->company_ZipCode }}</td>
                <td>{{ $company->company_address }}</td>
                <td>{{ $company->company_GUInumber }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('company.show',$company->id) }}">Show</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $companys->render() !!}
@endsection