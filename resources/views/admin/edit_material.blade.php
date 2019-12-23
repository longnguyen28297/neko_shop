@extends('layout.admin')
@section('adminCont')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Cập nhật chất liệu: {{$material_edit->name}}</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên:</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@else{{$material_edit->name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group clearfix">
                  <select name="id_category" class="custom-select col-auto @if ($errors->has('id_category')){{'error'}}@endif">
                    <option value="">Danh mục</option>
                    @foreach($category as $cate)
                    <option @if (isset($id_category)&& $id_category==$gender->id){{'selected'}} @elseif (($material_edit->id_category)==$cate->id){{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach()
                </select>
                @if ($errors->has('id_category'))
                <p class="error_noti">{{$errors->first('id_category')}}</p>
                @endif
                <button type="submit" class="btn btn-dark" name="add_prod">Cập nhật</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </div>
</div>
@stop()