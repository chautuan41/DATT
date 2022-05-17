@extends('user.layouts.app')
@section('title') Profile @endsection
@section('content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="../../user/images/avatar/11.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0">{{ $dtP->fullname }}</h3>
                                        <p class="text-muted mb-0">Canada</p>
                                    </div>
                                </div>
                                <h4>Thông tin</h4>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>{{ $dtP->phone }}</span></li>
                                    <li><strong class="text-dark mr-4">Email</strong> <span>{{ $dtP->email }}</span></li>
                                </ul>
                                <div class="general-button">
                                    <a href="{{route('profile.edit',['ID'=>$dtP->id])}}"><button type="button" class="btn mb-1 btn-primary">Chỉnh sửa</button></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection