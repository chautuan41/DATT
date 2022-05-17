@extends('layouts.dashboard')
@section('content')
<div class="app-title">
  <div>
  <p>
    <a href="{{route('form-create-room')}}" class="btn btn-primary pull-right">Thêm Lớp Học</a>
  </p>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Data Table</a></li></br>
  </ul>
  <form  type="get" action="{{route('search-room','room')}}">
  <li class="app-search" >
            <input class="app-search__input" type="search" name="query" placeholder="Search" style="border-style: solid;  border-width: 1px;"/>
            <button class="app-search__button" type="submit"> <i class="fa fa-search"></i></button>
    </li>
</form>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table class="table table-hover table-bordered" >
          <thead>
            <tr>
              <th>Id</th>
              <th>Lớp Học</th>
              <th>Chức Năng</th>
            </tr>
          </thead>
          <tbody>
            @forelse($room as $room)
            @if($room->status==1)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->room_name}}</td>
                <th><a class="" style="text-decoration: none; color:red" onclick="return confirm('Bạn có chắc không?')" 
                href="{{route('delete-room',['id_room'=>$room->id])}}">Xóa </a>|
                <a class="" style="text-decoration: none; color:black"
                href="{{route('form-update-room',['id_room'=>$room->id])}}"> Sửa</a>|
                </th>
            </tr>
            @endif
            @empty
            <tr>
                <td colspan="3">Không có dữ liệu</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection