@extends('layout.admin')
@section('adminCont')
<!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Danh mục</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0">Category Name</th>
                                                    <th class="border-0">Created At</th>
                                                    <th class="border-0">Updated At</th>
                                                    <th class="border-0">Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($category as $cate)
                                                <tr>
                                                    <td>{{$cate->id}}</td>
                                                    <td>
                                                        <div class="m-r-10"><img src="public/images/{{$cate->images}}" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td>{{$cate->name}}</td>
                                                    <td>{{$cate->created_at}} </td>
                                                    <td>{{$cate->updated_at}}</td>
                                                    @if($cate->status==1)
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
                                                    <td><a href="./administrator/editCategory/{{$cate->id}}">EDIT</a><a href="">/</a><a href="./administrator/delCategory/{{$cate->id}}" onclick="return del_cate()">DELETE</a></td>
                                                </tr>
                                               @endforeach
                                                <tr>
                                                    <td colspan="9"><a href="administrator/insertCategory" class="btn btn-dark float-right">Thêm mới</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination center">
                                        {!!$category->render()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
@stop()