@extends('layout.admin')
@section('adminCont')

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Danh sách chất liệu
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
         <tr>
          <th>#</th>
          <th>Tên chất liệu</th>
          <th>Ngày thêm</th>
          <th>Ngày sửa</th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
       <tr>
        <th>#</th>
        <th>Tên chất liệu</th>
        <th>Ngày thêm</th>
        <th>Ngày sửa</th>
        <th></th>
      </tr>
    </tfoot>
    <tbody>
     @foreach($material as $piece)
     <tr>
      <td>{{$piece->id}}</td>
      <td>{{$piece->name}}</td>
      <td>{{$piece->created_at}} </td>
      <td>{{$piece->updated_at}}</td>
      <td><a class="btn btn-info" href="./administrator/editMaterial/{{$piece->id}}">Sửa</a><a href="">&nbsp;</a><a class="btn-danger btn" href="./administrator/delMaterial/{{$piece->id}}" onclick="return del_brand()">Xoá</a></td>
    </tr>
    @endforeach()
  </tbody>
</table>
</div>
</div>
<div class="card-footer small text-muted"><a href="administrator/insertMaterial" class="btn btn-dark float-right">Thêm mới</a></div>

</div>
@stop()