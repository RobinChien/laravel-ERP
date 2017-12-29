@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>新增商品類別</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product_categories.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($categories, ['method' => 'PATCH','route' => ['product_categories.update', $categories->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>類別名稱:</strong>
                {!! Form::text('category_name', null, array('placeholder' => 'Category_Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>父類別:</strong>
                <label>
                    @if($categories->parent_id == '#')
                        <input type="checkbox" id="category_parent" name="category_parent" onclick="ShowHideDiv(this)" checked>
                    @else
                        <input type="checkbox" id="category_parent" name="category_parent" onclick="ShowHideDiv(this)">
                    @endif
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="child_div" style="display:block">
            <div class="form-group">
                <strong>隸屬類別:</strong>
                {!! Form::select('category_child', $product_categories, $categories->parent_id, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@stop
@section('js')
    <script type="text/javascript">
        window.onload = HideDiv();
        function HideDiv(){
            var child_div = document.getElementById("child_div");
            var value = "<?php echo $categories->parent_id ?>";
            child_div.style.display = (value == '#')?"none":"block";
        }

        function ShowHideDiv(category_parent) {
            var child_div = document.getElementById("child_div");
            child_div.style.display = category_parent.checked ? "none":"block";
        }
    </script>
@endsection