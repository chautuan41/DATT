@extends('layouts.dashboard')
@section('content')
<div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i> Thay đổi mật khẩu </h1>
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
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
        <form acction="{{route('handle-change-password',['id'=>$thongtin->id])}}"  method="POST">
        {{ csrf_field() }}
            <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu hiện tại</label>
            <input class="form-control" id='password' name="password_old" type="password" required> 
            @if($errors->has('password_old'))
            <span>{{$errors->first('password_old')}}</span>
            @endif
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input class="form-control" id='password_new' name="password_new" type="password" required>
            @if($errors->has('password_new'))
            <span>{{$errors->first('password_new')}}</span>
            @endif
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
            <input class="form-control" id='password_cf' name="password_cf" type="password" required>
            @if($errors->has('password_cf'))
            <span>{{$errors->first('password_cf')}}</span>
            @endif
            </div>
        <div class="tile-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        </form>
        </div>
    </div>
    
    </div>
</div>
</div>
@endsection