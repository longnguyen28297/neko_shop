@extends('layout.admin')
@section('adminCont')
<div class="container">
  <div class="card card-form" id="IProduct">
    <h5 class="card-header">Thêm mới sản phẩm</h5>
    <div class="card-body">
      <form method="POST" role="form" class="" enctype="multipart/form-data">
        <!-- name -->
        <div class="form-group">
          <div class="form-label-group">
            <input id="name" name="name" type="text" class="form-control @if($errors->has('name')){{'error'}}@endif" required="required" autofocus="autofocus" value="@isset($name){{$name}}@endisset" placeholder="Nhập tên">
            <label for="name" class="my_label col-form-label">Tên:</label>
          </div>
          @if ($errors->has('name'))
          <p class="error_noti pdt30">{{$errors->first('name')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- price -->
        <div class="form-group">
          <div class="form-label-group">
            <input id="price" name="price" type="number" maxlength="11" required="required" value="@isset($price){{$price}}@endisset" placeholder="Nhập giá sản phẩm" class="form-control @if ($errors->has('price')){{'error'}}@endif">
            <label for="price" class="my_label col-form-label">Giá:</label>
          </div>
          @if ($errors->has('price'))
          <p class="error_noti">{{$errors->first('price')}}</p>
          @endif
        </div>
        <!-- end -->

        <!-- category -->
        <div class="form-group">
          <select name="id_category" id="id_category" required="required" class="form-select custom-select col-auto @if ($errors->has('id_category')){{'error'}}@endif" onchange="loadSize(this)">
            <option value="">-Chọn danh mục-</option>
            @foreach($category as $cate)
            <option @if (isset($id_category)&& $id_category == $cate->id) {{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_category'))
          <p class="error_noti">{{$errors->first('id_category')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- child-list -->
        <div class="form-group">
          <div id="size">
            <span>---</span>
            <br>
            <span>---</span>
          </div>
          @if ($errors->has('id_size'))
          <p class="error_noti">{{$errors->first('id_size')}}</p>
          @endif
          @if ($errors->has('id_material'))
          <p class="error_noti">{{$errors->first('id_material')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- brand -->
        <div class="form-group">
          <select name="id_brand" required="required" class="form-select custom-select @if ($errors->has('id_brand')){{'error'}}@endif">
            <option value="">-Chọn thương hiệu-</option>
            @foreach($brand as $brand)
            <option @if (isset($id_brand)&& $id_brand == $brand->id) {{'selected'}}@endif value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_brand'))
          <p class="error_noti">{{$errors->first('id_brand')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- colors -->
        <div class="form-group">
          <select name="id_colors" required="required" class="form-select custom-select @if ($errors->has('id_colors')){{'error'}}@endif">
            <option value="">-Chọn màu sắc-</option>
            @foreach($colors as $colors)
            <option @if (isset($id_colors)&& $id_colors == $colors->id) {{'selected'}}@endif value="{{$colors->id}}">{{$colors->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_colors'))
          <p class="error_noti">{{$errors->first('id_colors')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- gender -->
        <div class="form-group">
          <select name="id_gender" required="required" class="form-select custom-select @if ($errors->has('id_gender')){{'error'}}@endif">
            <option value="">Giới tính</option>
            @foreach($gender as $gender)
            <option @if (isset($id_gender)&& $id_gender == $gender->id) {{'selected'}}@endif value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_gender'))
          <p class="error_noti">{{$errors->first('id_gender')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- sale off -->
        <div class="form-group">
          <label for="sale" class="btn btn-info">Giảm giá <input type="checkbox" id="sale" name="sale" onclick="loadSale(this)" checked class="badgebox"><span class="badge">&check;</span></label>
          <div id="value_sale" class="form-label-group d-none">
            <input type="number" name="sale_value" id="sale_value" class=" form-control">
            <label for="sale_value">Giá khuyến mại</label>
          </div>
          @if ($errors->has('promotional_price'))
          <p class="error_noti">{{$errors->first('promotional_price')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- Status -->
        <div class="form-group">
          <label for="status" class="btn btn-info"><span id="status_value">x</span> <input type="checkbox" onclick="loadStatus(this)" name="status" id="status" checked class="badgebox"><span class="badge">&check;</span></label>
        </div>
        <!-- end -->
        <!--images-->
        <div class="form-group">
          <div class="form-label-group">
            <input type="file" multiple id="images" name="images[]">
            <label for="">Ảnh sản phẩm:</label>
          </div>
          @if ($errors->has('images'))
          <p class="error_noti">{{ $errors->first('images') }}</p>
          @endif
        </div>
        <div class="form-group">
          <label for="">Mô tả:</label>
          <textarea class="form-control" name="description" id="description" maxlength="5000" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark" name="add_prod">Thêm</button>
        <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
      </form>
    </div>
  </div>
</div>
@stop()