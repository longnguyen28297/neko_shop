<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="login.html">Register</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
  <div class="card card-form" id="IProduct">
    <h5 class="card-header">Chỉnh sửa sản phẩm: {{$name_old}} - ID: <span>{{$id_product}}</span></h5>
    <div class="card-body">
      <form method="POST" role="form" class="" enctype="multipart/form-data">
        <!-- id -->
        <input type="hidden" id="id_product" name="id_product" value="{{$id_product}}">
        <!-- name <-->
          <div class="form-element">
        <label for="name" class="my_label col-form-label">Tên:</label>
        <input id="name" name="name" type="text" class="my_input form-control @if($errors->has('name')){{'error'}}@endif" value="@if(isset($name)){{$name}}@else{{$name_old}}@endif">
        @if ($errors->has('name'))
        <p class="error_noti pdt30">{{$errors->first('name')}}</p>
        @endif
      </div>
        <!-- end -->
        <!-- price <-->
          <div class="form-element">
        <label for="price" class="my_label col-form-label">Giá:</label>
        <input id="price" name="price" type="number" maxlength="11" value="@if(isset($price)){{$price}}@else{{$price_old}}@endif" class="my_input form-control @if ($errors->has('price')){{'error'}}@endif">
        @if ($errors->has('price'))
        <p class="error_noti">{{$errors->first('price')}}</p>
        @endif
      </div>
        <!-- end -->
          <!-- category <-->
            <div class="form-element">
          <select name="id_category" id="id_category" class=" form-select custom-select col-auto @if ($errors->has('id_category')){{'error'}}@endif" onchange="loadSize(this)">
            <option value="">-Chọn danh mục-</option>
            @foreach($category as $cate)
            <option @if (isset($id_category)&& $id_category == $cate->id) {{'selected'}}@elseif($id_category_old==$cate->id){{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_category'))
          <p class="error_noti">{{$errors->first('id_category')}}</p>
          @endif
        </div>
          <!-- end -->
          <!-- child-list <-->
            <div class="form-element">
          <div id="size">
          </div>
          @if ($errors->has('id_size'))
          <p class="error_noti">{{$errors->first('id_size')}}</p>
          @endif
          <br>
          @if ($errors->has('id_material'))
          <p class="error_noti">{{$errors->first('id_material')}}</p>
          @endif
        </div>
          <!-- end -->
          <!-- brand <-->
            <div class="form-element">
          <select name="id_brand" class="form-select custom-select @if ($errors->has('id_brand')){{'error'}}@endif">
            <option value="">-Chọn thương hiệu-</option>
            @foreach($brand as $brand)
            <option @if (isset($id_brand)&& $id_brand == $brand->id) {{'selected'}}@elseif($id_brand_old==$brand->id){{'selected'}}@endif value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_brand'))
          <p class="error_noti">{{$errors->first('id_brand')}}</p>
          @endif
          <br /> </div>
          <!-- end -->
          <!-- colors <-->
            <div class="form-element">
          <select name="id_colors" class="form-select custom-select @if ($errors->has('id_colors')){{'error'}}@endif">
            <option value="">-Chọn màu sắc-</option>
            @foreach($colors as $colors)
            <option @if (isset($id_colors)&& $id_colors == $colors->id) {{'selected'}}@elseif($id_colors_old==$colors->id){{'selected'}}@endif value="{{$colors->id}}">{{$colors->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_colors'))
          <p class="error_noti">{{$errors->first('id_colors')}}</p>
          @endif
          <br /> </div>
          <!-- end -->
          <!-- gender -->
          <div class="form-element">
          <select name="id_gender" class="form-select custom-select @if ($errors->has('id_gender')){{'error'}}@endif">
            <option value="">Giới tính</option>
            @foreach($gender as $gender)
            <option @if (isset($id_gender)&& $id_gender == $gender->id) {{'selected'}}@elseif($id_gender_old==$gender->id){{'selected'}}@endif value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_gender'))
          <p class="error_noti">{{$errors->first('id_gender')}}</p>
          @endif
 </div>
          <!-- end -->
        <!-- sale off <-->
          <div class="form-element">
        <label for="">Sale off: </label>
        <div class="switch-button switch-button-sm">
          <input type="checkbox" @if($sale_old==1){{'checked'}}@endif  name="sale" id="sale"><span>
            <label for="sale"></label></span>
          </div>
          <!-- end -->
          <!-- Status -->
          <label for="">Status: </label>
          <div class="switch-button switch-button-sm">
            <input type="checkbox"  @if($status_old==1){{'checked'}}@endif name="status" id="status"><span>
              <label for="status"></label></span>
            </div>
            <br /> </div>
            <!-- end -->
            <!--images-->
              <div class="form-element">
            </!--images-->
            <label for="">Ảnh sản phẩm:</label>
            <input type="file" multiple id="images" name="images[]">
            @if ($errors->has('images'))
            <p class="error_noti">{{ $errors->first('images') }}</p>
            @endif 
          </div>
            <!--images-->
            <br /><div class="form-element">
            <label for="">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" maxlength="5000" rows="3">{{$description_old}}</textarea>
            <br />
            <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
          </form>
        </div>
      </div>
    </div>
    @stop()
