@extends('layout.admin')
@section('adminCont')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Cập nhật giới tính: {{$name}}@else{{$gender_edit->name}}</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên:</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@else{{$gender_edit->name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{$errors->first('name')}}</p>
                    @endif
                </div>
                    <!--images-->
                    <button type="submit" class="btn btn-dark" name="add_prod">Cập nhật</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    @stop()