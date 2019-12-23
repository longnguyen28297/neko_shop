@extends('layout.admin')
@section('adminCont')

<div class="container">
  <div class="card card-form" id="IProduct">
    <h5 class="card-header">Chỉnh sửa sản phẩm: {{$name_old}} - ID: <span>{{$id_product}}</span></h5>
    <div class="card-body">
      <form method="POST" role="form" class="" enctype="multipart/form-data">
        <!-- id -->
        <input type="hidden" id="id_product" name="id_product" value="{{$id_product}}">
        <!-- name -->
        <div class="form-group">
          <div class="form-label-group">
            <input id="name" name="name" required type="text" class=" form-control @if($errors->has('name')){{'error'}}@endif" value="@if(isset($name)){{$name}}@elseif(isset($name_old)){{$name_old}}@endif">
            <label for="name" class="col-form-label">Tên:</label>
          </div>
          @if ($errors->has('name'))
          <p class="error_noti pdt30">{{$errors->first('name')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- price -->
        <div class="form-group">
          <div class="form-label-group">
            <input id="price" name="price" required type="number" maxlength="11" value="@if(isset($price)){{$price}}@elseif(isset($price_old)){{$price_old}}@endif" class="form-control @if ($errors->has('price')){{'error'}}@endif">
            <label for="price" class="col-form-label">Giá:</label>
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
            <option @if (isset($id_category)&& $id_category == $cate->id) {{'selected'}}@elseif($id_category_old==$cate->id){{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
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
            <option @if (isset($id_brand)&& $id_brand == $brand->id) {{'selected'}}@elseif($id_brand_old==$brand->id){{'selected'}}@endif value="{{$brand->id}}">{{$brand->name}}</option>
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
            <option @if (isset($id_colors)&& $id_colors == $colors->id) {{'selected'}}@elseif($id_colors_old==$colors->id){{'selected'}}@endif value="{{$colors->id}}">{{$colors->name}}</option>
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
            <option @if (isset($id_gender)&& $id_gender == $gender->id) {{'selected'}}@elseif($id_gender_old==$gender->id){{'selected'}}@endif value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach()
          </select>
          @if ($errors->has('id_gender'))
          <p class="error_noti">{{$errors->first('id_gender')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- sale off -->
        <div class="form-group">
          <label for="sale" class="btn btn-info">Giảm giá <input type="checkbox" id="sale" name="sale" @if($sale_old==1){{'checked'}}@endif onclick="loadSale(this)" checked class="badgebox"><span class="badge">&check;</span></label>
          <div id="value_sale" class="form-label-group d-none">
            <input type="number" name="promotional_price" id="promotional_price" value="@if(isset($promotional_price)){{$promotional_price}}@elseif(isset($promotional_price_old)){{$promotional_price_old}}@endif" class=" form-control">
            <label for="sale_value">Giá khuyến mại</label>
          </div>
          @if ($errors->has('promotional_price'))
          <p class="error_noti">{{$errors->first('promotional_price')}}</p>
          @endif
        </div>
        <!-- end -->
        <!-- Status -->
        <div class="form-group">
          <label for="status" class="btn btn-info"><span id="status_value">x</span> <input type="checkbox" @if($status_old==1){{'checked'}}@endif onclick="loadStatus(this)" name="status" id="status" checked class="badgebox"><span class="badge">&check;</span></label>
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
          <label for="">Ảnh hiện tại:</label>
          <br>
          <div id="list_img" class="m-r-10">
            <?php $images= DB::table('images')->where('id_product',$id_product)->paginate();
            foreach ($images as $image) {
              ?>
              <div class="images_edit text-center">
                  <img src="public/images/<?= $image->images; ?>" alt="user" class="rounded img_edit" width="100">
                  <button type="button" onclick="del_img_product({{$image->id}})" class="btn-sm btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                 
              </div>
            <?php } ?>
          </div>
          <p id="images_del" class="error_noti"></p>
        </div>
        <div class="form-group">
          <label for="">Mô tả:</label>
          <textarea class="form-control" name="description" id="description" maxlength="5000" rows="3">{{$description_old}}</textarea>
        </div>
        <button type="submit" class="btn btn-dark" name="add_prod">Cập nhật</button>
        <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
      </form>
    </div>
  </div>
</div>
@stop()
