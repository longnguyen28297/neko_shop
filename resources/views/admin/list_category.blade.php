@extends('layout.admin')
@section('adminCont')

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Danh sách danh mục
</div>
<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Ngày thêm</th>
            <th>Ngày sửa</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
      <tr>
        <th>#</th>
        <th>Ảnh</th>
        <th>Danh mục</th>
        <th>Ngày thêm</th>
        <th>Ngày sửa</th>
        <th>Trạng thái</th>
        <th></th>
    </tr>
</tfoot>
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
        <i class="fas fa-circle text-success fontsz11"></i>

        <p>Hiển thị</p>
    </td>
    @else
    <td>
        <i class="fas fa-circle text-warning fontsz11"></i>

        <p>Ẩn</p>
    </td>
    @endif
    <td><a class="btn btn-info" href="./administrator/editCategory/{{$cate->id}}">Sửa</a><a href="">&nbsp;</a><a class="btn btn-danger" href="./administrator/delCategory/{{$cate->id}}" onclick="return del_cate()">Xoá</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<div class="card-footer small text-muted"><a href="administrator/insertCategory" class="btn btn-dark float-right">Thêm mới</a></div>
</div>
@stop()