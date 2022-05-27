@extends('user.layouts.app')
@section('title') Inventory-create @endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kiểm kê</a></li>
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
                            <form class="form-valide" action="{{route('inventory.edit.post',['ID'=>$dt->id])}})}})}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Giảng viên <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="teacher">
                                            <option value="{{$dtTid->id}}">{{$dtTid->teacher_name}}</option>
                                            @foreach($dtT as $T)
                                            @if($T->id != $dtTid->id)
                                            <option value="{{$T->id}}">{{$T->teacher_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Lớp <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="grade">
                                            <option value="{{$dtGid->id}}">{{$dtGid->grade_name}}</option>
                                            @foreach($dtG as $G)
                                            @if($G->id != $dtGid->id)
                                            <option value="{{$G->id}}">{{$G->grade_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Ngày lập <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="text" class="form-control" name="date" placeholder="Ngày lập" id="mdate" value="{{$dt->date}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Ca thứ <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="shifts" required>
                                            <option value="{{$dt->shifts}}">{{$dt->shifts}}</option>
                                            @for ($x = 1; $x <= 4; $x++) 
                                            @if($x != $dt->shifts)
                                            <option value="$x">{{$x}}</option>
                                            @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Cơ sở vật chất <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="material_facilities" rows="5"  required>{{$dt->material_facilities}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Lỗi phần cứng <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="hardware_error" rows="5"  required>{{$dt->hardware_error}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Lỗi phần mềm <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="software_error" rows="5"  required>{{$dt->software_error}}</textarea>
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