@extends('user.layouts.app')
@section('title') Home @endsection
@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">IT CKC</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Inventory</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            @foreach ($dsR as $R)
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <a href="{{route('home.create',['ID'=>$R->id])}}">
                        <div class="social-graph-wrapper widget-facebook">
                            <span class="s-icon">Phòng {{ $R->room_name }}</i></span>
                        </div>
                    </a>
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">Tình trạng</h4>
                        @if($R->status==1)
                        <p class="m-0">Hoạt động</p>
                        @else
                        <p class="m-0">Không hoạt động</p>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach


        </div>
        <!-- #/ container -->

    </div>

@endsection