@extends('layout.admin')
@section('adminCont')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Cập nhật danh mục: {{$category_edit->name}}</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên danh mục</label>
                    <input id="name" value="@isset($name){{$name}}@else{{$category_edit->name}}@endisset" name="name" type="text" class="form-control @if($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <label for="">Status: </label>
                <div class="switch-button switch-button-sm">
                    
                    <input type="checkbox" @if(($category_edit->status)==1)
                    checked
                    @else
                    ''
                    @endif name="status" id="status"><span>
                        <label for="status"></label></span>
                    </div>
                    <br />
                    <br />
                    <label for="">Ảnh đại diện:</label>
                    <input type="file" id="images" name="images">
                    @if ($errors->has('images'))
                    <p class="error_noti">{{ $errors->first('images') }}</p>
                    @endif
                    <br/>
                    <label for="">Ảnh hiện tại:</label>
                    <img src="public/images/{{$category_edit->images}}" alt="user" class="rounded" width="45">
                    <!--images-->
                    <br/>
                    <button type="submit" class="btn btn-dark" name="add_prod">Cập nhật</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    @stop()