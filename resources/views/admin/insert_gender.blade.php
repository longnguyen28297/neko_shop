@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
    <div class="card">
        <h5 class="card-header">Thêm giới tính</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên:</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                    <!--images-->
                    <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    @stop()