@extends('layouts.dashboard')
@section('content')
<div class="app-title">
<div>
    <h1><i class="fa fa-edit"></i>Thêm</h1>
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
        <form method="POST" acction="{{route('create-teacher')}}">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Lớp</label>
            <input class="form-control" name="teacher_name" type="text" value="" required> 
            @if($errors->has('teacher_name'))
            <span>{{$errors->first('teacher_name')}}</span>
            @endif
            </div>
        <div class="tile-footer">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc không?')">Thêm lớp</button>
        </div>
        </form>
        </div>
    </div>
    
    </div>
</div>
</div>
@endsection