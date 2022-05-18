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
        <div class="col-lg-4 offset-lg-1">
        <form>
            <div class="form-group">
            <fieldset disabled="">
                <label class="control-label" for="disabledInput">Họ và tên</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$infor->fullname}}" disabled="">
            </fieldset>
            </div>
            <div class="form-group">
            <fieldset disabled="">
                <label class="control-label" for="disabledInput">Số điện thoại</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$infor->phone}}" disabled="">
            </fieldset>
            </div>
            <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" id="disabledInput" name="email" type="text" placeholder="{{$infor->email}}" disabled="">
            </div>
        </form>
        </div>
    </div>
    <div class="tile-footer">
        <a href="{{route('handle-update-profile',['id'=>$infor->id])}}" role="button" class="btn btn-primary">Chỉnh sửa</a>
    </div>
    </div>
</div>
</div>
@endsection