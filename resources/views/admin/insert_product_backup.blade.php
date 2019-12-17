@extends('layout.admin')
@section('adminCont')
<div class="col-lg-8 offset-lg-2 col-md-12">
  <div class="card">
    <h5 class="card-header">Thêm mới sản phẩm</h5>
    <div class="card-body">

      <form method="POST" role="form" class="" enctype="multipart/form-data">
        <label for="name" class="col-form-label">Tên sản phẩm</label>
        <input id="name" name="name" type="text" class="form-control @if($errors->has('name')){{'error'}}@endif" value="@isset($name){{$name}}@endisset" placeholder="Nhập tên">
        @if ($errors->has('name'))
        <p class="error_noti pdt30">{{$errors->first('name')}}</p>
        @endif
        <br />
        <label for="price">Giá:</label>
        <input id="price" name="price" type="number" maxlength="11" value="@isset($price){{$price}}@endisset" placeholder="Nhập giá sản phẩm" class="form-control @if ($errors->has('price')){{'error'}}@endif">
        @if ($errors->has('price'))
        <p class="error_noti">{{$errors->first('price')}}</p>
        @endif
        <br /><br />
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
          <br />
          <br />
          <select name="id_brand" class="custom-select @if ($errors->has('id_brand')){{'error'}}@endif">
            <option value="">Thương hiệu</option>
            @foreach($brand as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_brand'))
          <p class="error_noti">{{$errors->first('id_brand')}}</p>
          @endif
          <br />
          <br />
          <select multiple name="id_size" class="custom-select @if ($errors->has('id_size')){{'error'}}@endif">
            <option value="">Size</option>
            @foreach($size as $size)
            <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_size'))
          <p class="error_noti">{{$errors->first('id_size')}}</p>
          @endif
          <br />
          <br />
          <select name="id_colors" class="custom-select @if ($errors->has('id_colors')){{'error'}}@endif">
            <option value="">Màu sắc</option>
            @foreach($colors as $colors)
            <option value="{{$colors->id}}">{{$colors->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_colors'))
          <p class="error_noti">{{$errors->first('id_colors')}}</p>
          @endif
          <br />
          <br />
          <select name="id_gender" class="custom-select @if ($errors->has('id_gender')){{'error'}}@endif">
            <option value="">Giới tính</option>
            @foreach($gender as $gender)
            <option value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_gender'))
          <p class="error_noti">{{$errors->first('id_gender')}}</p>
          @endif
          <br />
          <br />
          <select name="id_material" class="custom-select @if ($errors->has('id_material')){{'error'}}@endif">
            <option value="">Chất liệu</option>
            @foreach($material as $material)
            <option value="{{$material->id}}">{{$material->name}}</option>
            @endforeach()
          </select> 
          @if ($errors->has('id_material'))
          <p class="error_noti">{{$errors->first('id_material')}}</p>
          @endif
          <br />
          <br />
        </div>

        <label for="">Sale off: </label>
        <div class="switch-button switch-button-sm">
          <input type="checkbox" checked name="sale" id="sale"><span>
            <label for="sale"></label></span>
          </div>
          <label for="">Status: </label>
          <div class="switch-button switch-button-sm">
            <input type="checkbox" checked name="status" id="status"><span>
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
            <textarea class="form-control" name="description" id="description" maxlength="5000" rows="3"></textarea>
            <br />
            <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </form>
        </div>
      </div>
    </div>
    @stop()