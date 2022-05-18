@extends('user.layouts.app')
@section('title') Task @endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng công việc</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Admin id</th>
                                        <th scope="col">Nhân viên id</th>
                                        <th scope="col">Phòng</th>
                                        <th scope="col">CSVC</th>
                                        <th scope="col">Phần cứng</th>
                                        <th scope="col">Phần mềm</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dtTask as $Task)
                                    <tr>
                                        <td>{{$Task->admin_id}}</td>
                                        <td>{{$Task->user_id }}</td>
                                        <td>{{$Task->room_name}}</td>
                                        <td>{{$Task->material_facilities}}</td>
                                        <td>{{$Task->hardware_error}}</td>
                                        <td>{{$Task->software_error}}</td>
                                        @if($Task->status==1)
                                        <td><span class="badge badge-primary px-2">Chờ bảo trì</span>
                                        </td>
                                        <td><span><a href="{{route('user.task.edit',['ID'=>$Task->id])}}" data-toggle="tooltip" data-placement="top" title="Bảo trì"><i class="fa fa-cogs color-muted m-r-5"></i> </a>
                                        </td>
                                        @else
                                        <td><span class="badge badge-success px-2">Đã bảo trì</span>
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
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection