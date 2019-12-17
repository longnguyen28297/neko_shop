@extends('layout.admin')
@section('adminCont')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Cập nhật thương hiệu: {{$brand_edit->name}}</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên thương hiệu</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@else{{$brand_edit->name}}@endisset" type="text" class="form-control @if($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <label for="">Hiển thị</label>
                <div class="switch-button switch-button-sm">
                    <input type="checkbox"  @if(isset($status)&&($status!='')){{'checked'}} @elseif(($brand_edit->status==1)) {{'checked'}}@endif name="status" id="status"><span>
                        <label for="status"></label></span>
                    </div>
                    <br />
                    <br />
                    <label for="">Ảnh đại diện hiện tại:</label>
                    <img src="public/images/{{$brand_edit->images}}" alt="user" class="rounded" width="45"><br><br>
                    <label for="">Ảnh đại diện mới:</label>
                    <input type="file" id="images" name="images">
                    @if ($errors->has('images'))
                    <p class="error_noti">{{ $errors->first('images') }}</p>
                    @endif
                    <br>
                    <!--images-->
                    <br>
                    <button type="submit" class="btn btn-dark" name="add_prod">Cập nhật</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    @stop()