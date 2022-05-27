@extends('layouts.dashboard')
@section('content')
<div class="app-title">
  <div>
  <p>
    <a href="{{route('form-create-staff')}}" class="btn btn-primary pull-right">Thêm Nhân Viên</a>
  </p>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
  </ul>
  <form  type="get" action="{{route('search-user','user')}}">
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
              <th>Họ và tên</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Chức Năng</th>
            </tr>
          </thead>
          <tbody>
            @forelse($lsUser as $user)
            @if($user ->status==1)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->fullname}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <th><a class="" style="text-decoration: none; color:red" onclick="return confirm('Bạn có chắc không?')" 
                href="{{route('delete-staff',['id_user'=>$user->id])}}">Khóa </a>|
                <a class="" style="text-decoration: none; color:black"
                href="{{route('form-update-staff',['id_user'=>$user->id])}}"> Sửa</a>
                </th>
            </tr>
            @endif
            @empty
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection