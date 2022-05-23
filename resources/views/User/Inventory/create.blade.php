@extends('user.layouts.app')
@section('title') Inventory-create @endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kiểm kê</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tạo</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{route('inventory.create.post')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Phòng<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="hidden"  class="form-control-plaintext" id="val-username" name="room" placeholder="Enter a username.." value="{{ $dtR->id }}">
                                        <input type="text" readonly="readonly" class="form-control-plaintext" id="val-username" name="val-username" placeholder="Enter a username.." value="Phòng máy {{ $dtR->room_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Nhân viên <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="hidden"  class="form-control-plaintext" id="val-username" name="user" placeholder="Enter a username.." value="{{ Auth::user()->id }}">
                                        <input type="text" class="form-control" readonly="readonly" id="val-email" name="val-username" placeholder="Your valid email.." value="{{ Auth::user()->fullname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Giảng viên <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="teacher">
                                            <option value="">Chọn giảng viên</option>
                                            @foreach($dtT as $T)
                                            <option value="{{$T->id}}">{{$T->teacher_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Lớp <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="grade">
                                            <option value="">Chọn lớp</option>
                                            @foreach($dtG as $G)
                                            <option value="{{$G->id}}">{{$G->grade_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Ngày lập <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="text" class="form-control" name="date" placeholder="Ngày lập" id="mdate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Ca thứ <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="shifts">
                                            <option value="">Chọn số ca</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Cơ sở vật chất <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="material_facilities" rows="5" placeholder="Mô tả......."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Lỗi phần cứng <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="hardware_error" rows="5" placeholder="Mô tả......."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Lỗi phần mềm <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="software_error" rows="5" placeholder="Mô tả......."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Tình trạng <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="hidden"  class="form-control-plaintext" id="val-username" name="status" placeholder="Enter a username.." value="1">
                                        <input type="text" readonly="readonly" class="form-control-plaintext" id="val-username" name="val-username" placeholder="Enter a username.." value="Kiểm kê">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

@endsection