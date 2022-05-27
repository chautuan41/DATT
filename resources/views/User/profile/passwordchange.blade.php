@extends('user.layouts.app')
@section('title') Edit Profile @endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Thông tin cá nhân</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sửa</a></li>
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
                            <form class="form-valide" action="{{route('user.changepassword.post',['ID'=>$dtP->id])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Mật khẩu hiện tại<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-username" name="password" placeholder="Mật khẩu hiện tại" required>
                                        @if($errors->has('password'))
                                        <span>{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Mật khẩu mới <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-email" name="new" placeholder="Mật khẩu mới" required>
                                        @if($errors->has('new'))
                                        <span>{{$errors->first('new')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Xác nhận lại mật khẩu <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-email" name="confirm" placeholder="Xác nhận mật khẩu" required>
                                        @if($errors->has('confirm'))
                                        <span>{{$errors->first('confirm')}}</span>
                                        @endif
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