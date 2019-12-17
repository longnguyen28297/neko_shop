@extends('layout.admin')
@section('adminCont')
<!-- recent orders  -->
<!-- ============================================================== -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Sản phẩm</h5>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr class="border-0">
                            <th class="border-0">#</th>
                            <th class="border-0">Image</th>
                            <th class="border-0">Product Name</th>
                            <th class="border-0">Price</th>
                            <th class="border-0">Category</th>
                            <th class="border-0">Brand</th>
                            <th class="border-0">Colors</th>
                            <th class="border-0">Size</th>
                            <th class="border-0">Material</th>
                            <th class="border-0">Gender</th>
                            <th class="border-0">Created At</th>
                            <th class="border-0">Updated At</th>
                            <th class="border-0">Status</th>
                            <th class="border-0">Sale off</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $piece)
                        <tr>
                            <td>{{$piece->id_product}}</td>
                            <td>
                                <div class="m-r-10"><img src="public/images/{{$piece->images}}" alt="user" class="rounded" width="45"></div>
                            </td>
                            <td>{{$piece->name}}</td>
                            <td>{{$piece->price}}</td>
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
                                    <span class="badge-dot badge-success mr-1"></span>

                                    <p>Hiển thị</p>
                                </td>
                                @else
                                <td>
                                    <span class="badge-dot badge-brand mr-1"></span>

                                    <p>Ẩn</p>
                                </td>
                                @endif
                                @if($piece->sale==1)
                                <td>
                                    <span class="badge-dot badge-success mr-1"></span>

                                    <p>Sale</p>
                                </td>
                                @else
                                <td>
                                    <span class="badge-dot badge-brand mr-1"></span>

                                    <p>Không</p>
                                </td>
                                @endif
                                <td><a href="./administrator/editProduct/{{$piece->id}}">EDIT</a><a href="">/</a><a href="./administrator/delProduct/{{$piece->id}}" onclick="return del_brand()">DELETE</a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="9"><a href="administrator/insertProduct" class="btn btn-dark float-right">Thêm mới</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination center">
                    {!!$product->render()!!}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end recent orders  -->
    @stop()