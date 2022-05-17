@extends('layouts.dashboard')
@section('content')
<div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i> Thông tin cá nhân </h1>
</div>
<ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Thông tin</li>
    <li class="breadcrumb-item"><a href="#">Thông tin</a></li>
</ul>
</div>
<div class="row">
<div class="col-md-12">
    <div class="tile">
    <div class="row">
    <div class="col-lg-6">
        <form method="POST" acction="{{route('',['id'=>$infor->id])}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Nhân Viên</label>
                <input class="form-control" name="fullname" type="text" value="" required>
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số Điện Thoại</label>
                <input class="form-control" name="phone" type="text" value="" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" id="disabledInput" name="email" type="text" placeholder="{{$infor->email}}" disabled="">
            </div>
        <div class="tile-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        </form>
        <div class="tile-footer">
            <a href="{{route('form-change-password',['id'=>$infor->id])}}" role="button" class="btn btn-primary">Thay đổi mật khẩu</a>
        </div>
        </div>
    </div>
    
    </div>
</div>
</div>
@endsection