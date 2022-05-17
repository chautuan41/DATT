@extends('layouts.dashboard')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Thông tin</h1>
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
                    <form method="POST" acction="{{route('update-staff',['id_user'=>$id_user])}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Nhân Viên</label>
                            <input class="form-control" name="fullname" type="text" value="{{$dsUser->fullname}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Điện Thoại</label>
                            <input class="form-control" name="phone" type="text" value="{{$dsUser->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input class="form-control" name="email" type="text" value="{{$dsUser->email}}" readonly>
                        </div>
                        <div class="tile-footer">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc không?')">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection