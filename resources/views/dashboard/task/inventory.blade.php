@extends('layouts.dashboard')
@section('content')
<div class="app-title">
  
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
              <th>Nhân viên</th>
              <th>Phòng</th>
              <th>Giảng viên</th>
              <th>Lớp</th>
              <th>Ngày lập</th>
              <th>Ca</th>
              <th>Cơ sở vật chất</th>
              <th>Lỗi phần cứng</th>
              <th>Lỗi phần mềm</th>
              <th>Tình trạng</th>
            </tr>
          </thead>
          <tbody>
          @foreach($dtInv as $Inv)
                                    <tr>
                                        <td>{{$Inv->fullname }} {{$Inv->id }}</td>
                                        <td>{{$Inv->room_id}}</td>
                                        <td>{{$Inv->teacher_id}}</td>
                                        <td>{{$Inv->grade_id}}</td>
                                        <td>{{$Inv->date}}</td>
                                        <td>{{$Inv->shifts}}</td>
                                        <td>{{$Inv->material_facilities}}</td>
                                        <td>{{$Inv->hardware_error}}</td>
                                        <td>{{$Inv->software_error}}</td>
                                        @if($Inv->status==1)
                                        <td><span class="badge badge-primary px-2">Chờ duyệt</span>
                                        </td>
                                        <td>
                                        <a class="" style="text-decoration: none; color:red" onclick="return confirm('Bạn có chắc không?')" 
                                            href="{{route('task.confirm',['ID'=>$Inv->id])}}">Xác nhận </a>|
                                        </td>
                                        <!-- <td><span><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                        </td> -->
                                        @else
                                        <td><span class="badge badge-success px-2">Đã duyệt</span>
                                        </td>
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