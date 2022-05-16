<?php

namespace App\Http\Controllers;

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
use Auth;
use Hash;

class AdminController extends Controller
{
    public function loginAD(){
        return view('dashboard.page-login');
    }
    public function xuLyloginAD(Request $request){
        //     // return view('xl-dang-nhap');
        //     dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Chứng thực thành công
        // $user = Auth::user();
        // $id = Admin::find($user->id);
       // @dd($id);
       return redirect()->route('index-ad');
        }else{
            return redirect()->back()->with("error","Đăng nhập không thành công");
        }
    }
    public function indexAD(Request $id){
        $index = Admin::find($id);
      //  @dd($id);
        return view('dashboard.index',compact('index'));
    }
}
