@extends('layout.admin')
@section('adminCont')
<!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Chất liệu</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Material Name</th>
                                                    <th class="border-0">Created At</th>
                                                    <th class="border-0">Updated At</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($material as $piece)
                                                <tr>
                                                    <td>{{$piece->id}}</td>
                                                    <td>{{$piece->name}}</td>
                                                    <td>{{$piece->created_at}} </td>
                                                    <td>{{$piece->updated_at}}</td>
                                                     <td><a href="./administrator/editMaterial/{{$piece->id}}">EDIT</a><a href="">/</a><a href="./administrator/delMaterial/{{$piece->id}}" onclick="return del_brand()">DELETE</a></td>
                                                </tr>
                                                @endforeach()
                                                <tr>
                                                    <td colspan="9"><a href="administrator/insertMaterial" class="btn btn-dark float-right">Thêm mới</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination center">
                                        {!!$material->render()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
@stop()