@extends('layouts.dashboard')
@section('content')
<div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i>Thêm công việc</h1>
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
        <form method="POST" acction="{{route('task.create.post')}}">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Admin</label>
            <input class="form-control"  name="admin" type="hidden" value="{{Auth::user()->id}}" required> 
            <input class="form-control" name="text" type="text" value="{{Auth::user()->fullname}}" required> 
            </div>
            <div class="fo rm-group">
            <label for="exampleInputEmail1">Nhân viên</label>
            <select name="user" id="MaNCC">
                    <option value="">Không nhập giá trị</option>
                    @foreach($dtU as $a)
                        <option value="{{$a->id}}">{{$a->fullname}}</option>
                    @endforeach                                    
                </select>     
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Phòng</label>
            <select name="room" id="MaNCC">
                    <option value="">Không nhập giá trị</option>
                    @foreach($dtR as $a)
                        <option value="{{$a->id}}">{{$a->room_name}}</option>
                    @endforeach                                    
                </select> 
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Cơ sở vật chất</label>
            <input class="form-control" name="material_facilities" type="text"  required> 
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Lỗi phần cứng</label>
            <input class="form-control" name="hardware_error" type="text"  required> 
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Lỗi phần mềm</label>
            <input class="form-control" name="software_error" type="text"  required> 
            </div>
        <div class="tile-footer">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc không?')">Thêm công việc</button>
        </div>
        </form>
        </div>
    </div>
    
    </div>
</div>
</div>
@endsection