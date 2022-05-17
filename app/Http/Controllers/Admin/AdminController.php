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
    public function loginAD(){
        return view('dashboard.page-login');
    }
    // public function xuLyloginAD(Request $request){
    //     //     // return view('xl-dang-nhap');
    //     //     dd($request);
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //     // Chứng thực thành công
    //     $user = Auth::user();
    //     $id = Admin::find($user->id);
    //    //@dd($id);
    //    return redirect()->route('index-ad');
    //     }else{
    //         return redirect()->back()->with("error","Đăng nhập không thành công");
    //     }
    // }
    //Xử lý Đăng nhập
    public function xuLyloginAD(Request $request){
<<<<<<< HEAD:app/Http/Controllers/AdminController.php
        $ad = Admin::where('email',$request->email)->first();
        if(empty($ad)){
=======
        //     // return view('xl-dang-nhap');
        //     dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Chứng thực thành công

        $user = Auth::user();
        $id = Admin::find($user->id);
       //@dd($id);

        // $user = Auth::user();
        // $id = Admin::find($user->id);
       // @dd($id);

       return redirect()->route('index-ad');
        }else{
>>>>>>> b8cc5f81eecfb0494c155c6f9a8708294ed03a2e:app/Http/Controllers/Admin/AdminController.php
            return redirect()->back()->with("error","Đăng nhập không thành công");
        }elseif(!Hash::check($request->password,$ad->password)){
            return redirect()->back()->with("error","Đăng nhập không thành công");
        }else{
            $dt=Admin::find($ad);
            return redirect()->route('index-ad',compact('dt'));
        }
    }

    public function indexAD(){
        //@dd($id);
        return view('dashboard.index');
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
