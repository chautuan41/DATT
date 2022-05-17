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
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tableUser(){
        $lsUser = User::all();
        return view('dashboard.user-table',compact('lsUser'));
    }
    public function deleteLsStaff($id_user){
        $user = User::find($id_user);
        $user->status = 0;
        $user->save();
        $dsUser = User::all();
        return redirect()->route('table-user');
    }
    public function formUpdateStaff($id_user){
        $dsUser = User::find($id_user);
        return view('dashboard.update.form-update-user',compact('id_user','dsUser'));
    }

    public function updateStaff(Request $request,$id_user){
        $updateUser = User::find($id_user);
        $updateUser->fullname = $request->fullname;
        $updateUser->phone = $request->phone;
        $updateUser->email = $request->email;
        $updateUser->save();
        $upuser = User::find($id_user);
        return redirect()->route('table-user',['id'=>$upuser]);
    }
    public function formCreateStaff(){
        return view('dashboard.create.form-create-user');
    }
    public function createStaff(Request $request){
        $us = User::where('email',$request->email)->first();
        if($us == true){
            return redirect()->back()->with("error","Nhân viên đã tồn tại.");
        }
        $u = new User();
        $u->fullname = $request->fullname;
        $u->phone = $request->phone;
        $u->email = $request->email;
        $u->password = Hash::make('12345');
        $u->status = 1;
        $u->save();
        return redirect()->back()->with("success","Thêm nhân viên thành công!");
    }
    public function searchUser(){
        $search_text=$_GET['query'];
        $user=User::where('fullname','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.search-user',compact('user'));
    }
}
