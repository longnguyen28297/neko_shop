@extends('layout.admin')
@section('adminCont')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Danh sách sản phẩm
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tbl_product" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Màu sắc</th>
                <th>Size</th>
                <th>Chất liệu</th>
                <th>Giới tinh</th>
                <th>Ngày thêm</th>
                <th>Ngày sửa</th>
                <th>Trạng thái</th>
                <th>Khuyến mại</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Màu sắc</th>
                <th>Size</th>
                <th>Chất liệu</th>
                <th>Giới tinh</th>
                <th>Ngày thêm</th>
                <th>Ngày sửa</th>
                <th>Trạng thái</th>
                <th>Khuyến mại</th>
                <th></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($product as $piece)
        <tr>
            <td>{{$piece->id}}</td>
            <td>
                <div class="m-r-10">
                    <?php $images= DB::table('images')->where('id_product',$piece->id)->paginate();
                    foreach ($images as $image) {
                        ?> 
                        <img src="public/images/<?= $image->images; ?>" alt="user" class="rounded" width="45">
                    <?php } ?>
                </div>
            </td>
            <td>{{$piece->name}}</td>
            <td>{{$piece->price}}</td>
            <td>{{$piece->promotional_price}}</td>
            <td><?php $category= DB::table('Category')->where('id',$piece->id_category)->first(); ?> 
            {{$category->name}}</td>
            <td> 
                <?php $colors= DB::table('brand')->where('id',$piece->id_brand)->first(); ?> 
                {{$colors->name}}</td>
                <td>
                    <?php $colors= DB::table('colors')->where('id',$piece->id_colors)->first(); ?> 
                    {{$colors->name}}
                </td>
                <td>
                    <?php 
                    $list_size = explode(',',$piece->list_size);
                    $count = count($list_size);
                    for ($i = 0; $i <$count; $i++) {
                        $size= DB::table('size')->where('id',$list_size[$i])->first();
                        echo $size->name.' ';
                    }
                    ?>
                </td>
                <td><?php
                $list_material='';
                $get_list_material = explode(',',$piece->list_material);
                $count = count($get_list_material);
                for ($i = 0; $i <$count; $i++) {
                    $material= DB::table('material')->where('id',$get_list_material[$i])->first();

                    $list_material.=($material->name.'-');
                }
                echo trim($list_material,'-');
                ?></td>
                <td>
                    <?php $colors= DB::table('gender')->where('id',$piece->id_gender)->first(); ?> 
                    {{$colors->name}}
                </td>
                <td>{{$piece->created_at}} </td>
                <td>{{$piece->updated_at}}</td>
                @if($piece->status==1)
                <td>
                    <i class="fas fa-circle text-success fontsz11"></i>

                    <p>Hiển thị</p>
                </td>
                @else
                <td>
                    <i class="fas fa-circle text-warning fontsz11"></i>

                    <p>Ẩn</p>
                </td>
                @endif
                @if($piece->sale==1)
                <td>
                    <i class="fas fa-circle text-success fontsz11"></i>

                    <p>Sale</p>
                </td>
                @else
                <td>
                    <i class="fas fa-circle text-warning fontsz11"></i>

                    <p>Không</p>
                </td>
                @endif
                <td><a class="btn btn-info" href="./administrator/editProduct/{{$piece->id}}">Sửa</a><a href="">&nbsp;</a><a class="btn btn-danger" href="./administrator/delProduct/{{$piece->id}}" onclick="return del_product()">Xoá</a></td>
            </tr>
            @endforeach
    </tbody>
</table>
</div>
</div>
<div class="pagination center">
</div>
</div>
</div>
@stop()



