@extends('layouts.dashboard')
@section('content')
<div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i>Thêm Nhân Viên</h1>
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
        <form method="POST" acction="{{route('create-staff')}}">
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
                <input class="form-control" name="email" type="text" value="" required>
                @if($errors->has('email'))
                <span>{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="tile-footer">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc không?')">Thêm nhân viên</button>
        </div>
        </form>
        </div>
    </div>
    
    </div>
</div>
</div>
@endsection