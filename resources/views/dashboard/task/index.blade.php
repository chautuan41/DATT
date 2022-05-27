@extends('layouts.dashboard')
@section('content')
<div class="app-title">
  <div>
  <p>
    <a href="{{route('task.create')}}" class="btn btn-primary pull-right">Thêm công việc</a>
  </p>
</div>
<div>
  <p>
    <a href="{{route('task.inventory')}}" target="blank" class="btn btn-primary pull-right">Danh sách kiểm kê</a>
  </p>
  </div>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Data Table</a></li></br>
  </ul>
  <form  type="get" action="{{route('search-grade','grade')}}">
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
          <!-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search" />
          <button class="app-search__button">
            <i class="fa fa-search"></i>
          </button>
        </li> -->
          <thead>
            <tr>
              <th>#</th>
              <th>Admin</th>
              <th>Nhân viên</th>
              <th>Phòng</th>
              <th>Cơ sở vật chất</th>
              <th>Lỗi phần cứng</th>
              <th>Lỗi phần mềm</th>
              <th>Tình trạng</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($dtTask as $Task)
            <tr>
                <td>{{$Task->id}}</td>
                <td>{{$Task->admin_id}}</td>
                <td>{{$Task->user_id}}</td>
                <td>{{$Task->room_id}}</td>
                <td>{{$Task->material_facilities}}</td>
                <td>{{$Task->hardware_error}}</td>
                <td>{{$Task->software_error}}</td>
                @if($Task->status==1)
                <td>Chờ bảo trì</td>
                @else 
                <td>Đã bảo trì</td>
                @endif
                
                
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection