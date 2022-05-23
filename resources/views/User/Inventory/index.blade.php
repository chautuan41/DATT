@extends('user.layouts.app')
@section('title') Inventory @endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kiểm kê</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng kiểm kê</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nhân viên id</th>
                                        <th scope="col">Phòng id</th>
                                        <th scope="col">Giảng viên id</th>
                                        <th scope="col">Lớp id</th>
                                        <th scope="col">Ngày lập</th>
                                        <th scope="col">Ca</th>
                                        <th scope="col">CSVC</th>
                                        <th scope="col">Phần cứng</th>
                                        <th scope="col">Phần mềm</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col"></th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dtInv as $Inv)
                                    <tr>
                                        <td>{{$Inv->user_id }}</td>
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
                                        <td><span><a href="{{route('inventory.edit',['ID'=>$Inv->id])}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                        </td>
                                        @else
                                        <td><span class="badge badge-success px-2">Đã duyệt</span>
                                        </td>
                                        <td></td>
                                        @endif
                                        
                                    </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection