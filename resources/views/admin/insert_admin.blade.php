@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
    <div class="card">
        <h5 class="card-header">Thêm mới admin</h5>
        <div class="card-body">
            <form method="POST" role="form" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên:</label>
                    <input id="name" name="name" value="@isset($name){{$name}}@endif" type="text" class="form-control @if ($errors->has('name')){{'error'}}@endif">
                    @if ($errors->has('name'))
                    <p class="error_noti">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone" class="col-form-label">Số điện thoại</label>
                    <input id="phone" name="phone" value="@isset($phone){{$phone}}@endif" type="text" class="form-control @if ($errors->has('phone')){{'error'}}@endif">
                    @if ($errors->has('phone'))
                    <p class="error_noti">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input id="email" name="email" value="@isset($email){{$email}}@endif" type="email" class="form-control @if ($errors->has('email')){{'error'}}@endif">
                    @if ($errors->has('email'))
                    <p class="error_noti">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label">Mật khẩu</label>
                    <input id="password" name="password" value="@isset($password){{$password}}@endif" type="password" class="form-control @if ($errors->has('password')){{'error'}}@endif">
                    @if ($errors->has('password'))
                    <p class="error_noti">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <select name="id_level" class="custom-select col-auto @if ($errors->has('id_level')){{'error'}}@endif">
            <option value="">Level</option>
            @foreach($level as $level)
            <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_level'))
          <p class="error_noti">{{$errors->first('id_level')}}</p>
          @endif
          <br />
          <br />
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