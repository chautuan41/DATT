<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Room;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    

    public function indexAD(){
        //@dd($id);
        return view('layouts.dashboard');
    }
    function formProfile($id){
        $infor = Admin::find($id);
        return view('dashboard.profile.infor',compact('infor','id'));
    }
    function updateProfile(Request $req,$id){
        $ad = Admin::find($id);
        $ad->email=$req->email;
        $ad->fullname=$req->fullname;
        $ad->phone=$req->phone;
        $ad->save();
        $infor = Admin::find($id);
        return view('dashboard.profile.update-infor',compact('infor','id'));
    }
    
}
