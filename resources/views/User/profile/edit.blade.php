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
                            <form class="form-valide" action="{{route('profile.edit.post',['ID'=>$dtP->id])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Email<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" readonly="readonly" class="form-control-plaintext" id="val-username" name="val-username" placeholder="Enter a username.." value="{{ $dtP->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Họ tên <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control"  id="val-email" name="fullname" placeholder="Your valid email.." value="{{ $dtP->fullname}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Số điện thoại <span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control"  id="val-email" name="phone" placeholder="Your valid email.." value="{{ $dtP->phone}}" required>
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