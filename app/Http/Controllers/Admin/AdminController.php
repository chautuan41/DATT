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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    

    public function indexAD(){
        //@dd($id);
        return view('layouts.dashboard');
    }
    function formProfile($id){
        $infor = Admin::find($id);
        return view('dashboard.profile.update-infor',compact('infor'));
    }
    function updateProfile(Request $req,$id){
        $ad = Admin::find($id);
        $ad->fullname=$req->fullname;
        $ad->phone=$req->phone;
        $ad->save();
        $infor = Admin::find($id);
        return view('dashboard.profile.infor',compact('infor'));
    }
    public function formChangePassword($id){
        $thongtin = Admin::find($id); 
        return view('dashboard.profile.change-password',compact('thongtin','id'));
        
    }
    public function updatePassword(Request $request,$id) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với mật khẩu.",$id);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","Mật khẩu mới không được giống với mật khẩu hiện tại của bạn.",$id);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Xác nhận mật khẩu không khớp.",$id);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Mật khẩu đã được thay đổi thành công!",$id);
    }
}
