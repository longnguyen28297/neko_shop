@extends('layout.admin')
@section('adminCont')
<!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Giới tính</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Gender Name</th>
                                                    <th class="border-0">Created At</th>
                                                    <th class="border-0">Updated At</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($gender as $piece)
                                                <tr>
                                                    <td>{{$piece->id}}</td>
                                                    <td>{{$piece->name}}</td>
                                                    <td>{{$piece->created_at}} </td>
                                                    <td>{{$piece->updated_at}}</td>
                                                     <td><a href="./administrator/editGender/{{$piece->id}}">EDIT</a><a href="">/</a><a href="./administrator/delGender/{{$piece->id}}" onclick="return del_brand()">DELETE</a></td>
                                                </tr>
                                                @endforeach()
                                                <tr>
                                                    <td colspan="9"><a href="administrator/insertGender" class="btn btn-dark float-right">Thêm mới</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination center">
                                        {!!$gender->render()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
@stop()