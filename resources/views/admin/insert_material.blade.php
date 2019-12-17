@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
    <div class="card">
        <h5 class="card-header">Thêm chất liệu</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên:</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group clearfix">
                  <select name="id_category" class="custom-select col-auto @if ($errors->has('id_category')){{'error'}}@endif">
                    <option value="">Danh mục</option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach()
                </select>
                @if ($errors->has('id_category'))
                <p class="error_noti">{{$errors->first('id_category')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
</div>
</div>
@stop()