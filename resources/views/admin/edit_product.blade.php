@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
  <div class="card card-form" id="IProduct">
    <h5 class="card-header">Thêm mới sản phẩm</h5>
    <div class="card-body">
      <form method="POST" role="form" class="" enctype="multipart/form-data">
        <label for="name" class="my_label col-form-label">Tên:</label>
        <input id="name" name="name" type="text" class="my_input form-control @if($errors->has('name')){{'error'}}@endif" value="@if(isset($name)){{$name}}@else{{$name_old}}@endif">
        @if ($errors->has('name'))
        <p class="error_noti pdt30">{{$errors->first('name')}}</p>
        @endif
        <br />
        <label for="price" class="my_label col-form-label">Giá:</label>
        <input id="price" name="price" type="number" maxlength="11" value="@if(isset($price)){{$price}}@else{{$price_old}}@endif" placeholder="{{$price_old}}" class="my_input form-control @if ($errors->has('price')){{'error'}}@endif">
        @if ($errors->has('price'))
        <p class="error_noti">{{$errors->first('price')}}</p>
        @endif
        <br /><br />
        <div class="form-group clearfix">
          <select name="id_category" id="id_category" class=" form-select custom-select col-auto @if ($errors->has('id_category')){{'error'}}@endif" onchange="loadSize(this)">
            <option value="">-Chọn danh mục-</option>
            @foreach($category as $cate)
            <option @if (isset($id_category)&& $id_category == $cate->id) {{'selected'}}@elseif($id_category_old==$cate->id){{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_category'))
          <p class="error_noti">{{$errors->first('id_category')}}</p>
          @endif
          <br />
          <br />
          <!-- child-list -->
         <div id="size">
            <div class="child_select">
  <label for="">Size:</label>
<div class="clearfix" id="size">
  @foreach ($size as $size)
  <div class="check-box">
    <label for="">{{$size->name}}</label>
    <input type="checkbox" name="id_size[]" id="id_size"  value="{{$size->id}}" class="">
  </div>
  @endforeach()
</div>@if ($errors->has('id_size'))
          <p class="error_noti">{{$errors->first('id_size')}}</p>
          @endif
            <br>
<br />
<label for="">Chất liệu:</label>
<div class="clearfix" id="material">

  @foreach($material as $material)
  <div class="check-box">
    <label for="">{{$material->name}}</label>
    <input type="checkbox" name="id_material[]" id="id_material" value="{{$material->id}}" class="">
  </div>
  @endforeach()
</div>
            @if ($errors->has('id_material'))
          <p class="error_noti">{{$errors->first('id_material')}}</p>
          @endif</div>
          </div>
          <!-- end -->
          <br />
          <select name="id_brand" class="form-select custom-select @if ($errors->has('id_brand')){{'error'}}@endif">
            <option value="">-Chọn thương hiệu-</option>
            @foreach($brand as $brand)
            <option @if (isset($id_brand)&& $id_brand == $brand->id) {{'selected'}}@elseif($id_brand_old==$brand->id){{'selected'}}@endif value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_brand'))
          <p class="error_noti">{{$errors->first('id_brand')}}</p>
          @endif
          <br />
          <br />
          <select name="id_colors" class="form-select custom-select @if ($errors->has('id_colors')){{'error'}}@endif">
            <option value="">-Chọn màu sắc-</option>
            @foreach($colors as $colors)
            <option @if (isset($id_colors)&& $id_colors == $colors->id) {{'selected'}}@elseif($id_colors_old==$colors->id){{'selected'}}@endif value="{{$colors->id}}">{{$colors->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_colors'))
          <p class="error_noti">{{$errors->first('id_colors')}}</p>
          @endif
          <br />
          <br />
          <select name="id_gender" class="form-select custom-select @if ($errors->has('id_gender')){{'error'}}@endif">
            <option value="">Giới tính</option>
            @foreach($gender as $gender)
            <option @if (isset($id_gender)&& $id_gender == $gender->id) {{'selected'}}@elseif($id_gender_old==$gender->id){{'selected'}}@endif value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_gender'))
          <p class="error_noti">{{$errors->first('id_gender')}}</p>
          @endif
          <br />
          <br />
        </div>

        <label for="">Sale off: </label>
        <div class="switch-button switch-button-sm">
          <input type="checkbox" @if($sale_old==1){{'checked'}}@endif  name="sale" id="sale"><span>
            <label for="sale"></label></span>
          </div>
          <label for="">Status: </label>
          <div class="switch-button switch-button-sm">
            <input type="checkbox"  @if($status_old==1){{'checked'}}@endif name="status" id="status"><span>
              <label for="status"></label></span>
            </div>
            <br />
            <br />
            <label for="">Ảnh sản phẩm:</label>
            <input type="file" id="images" name="images">
            @if ($errors->has('images'))
            <p class="error_noti">{{ $errors->first('images') }}</p>
            @endif
            <!--images-->
            <br />
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