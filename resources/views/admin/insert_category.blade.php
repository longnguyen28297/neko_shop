@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
    <div class="card">
        <h5 class="card-header">Thêm mới danh mục sản phẩm</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên danh mục</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <label for="">Status: </label>
                <div class="switch-button switch-button-sm">
                    <input type="checkbox" checked value="1" name="status" id="status"><span>
                        <label for="status"></label></span>
                    </div>
                    <br />
                    <br />
                    <label for="">Ảnh đại diện:</label>
                    <input type="file" id="images" name="images">
                    @if ($errors->has('images'))
                    <p class="error_noti">{{ $errors->first('images') }}</p>
                    @endif
                    <!--images-->
                    <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    @stop()