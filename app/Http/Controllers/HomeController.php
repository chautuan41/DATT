<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dsR = DB::table('rooms')->where('status','=','1')->get();
        //dd($dsR);
        return view('user.home',compact('dsR'));
    }

    

    public function profile($id)
    {
        $dtP = User::find($id);
        //dd($dtP);
        return view('user.profile.index',compact('dtP'));
    }

    public function editShowProfile($id)
    {
        $dtP = User::find($id);
        //dd($dtP);
        return view('user.profile.edit',compact('dtP'));
    }

    public function formChangePassword($id)
    {
        $dtP = User::find($id);
        //dd($dtP);
        return view('user.profile.passwordchange',compact('dtP'));
    }

    public function updatePassword(Request $request,$id)
    {
        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không trùng khớp.",$id);
        }

        if(strcmp($request->get('password'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","Mật khẩu mới không trùng khớp với mật khẩu hiện tại.",$id);
        }
        if(strcmp($request->get('new'), $request->get('confirm')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Xác nhận mật khẩu không trùng khớp.",$id);
        }

        $user = User::find($id);
        $user->password = bcrypt($request->get('new'));
        $user->save();

        return redirect()->back()->with("success","Mật khẩu thay đổi thành công!",$id);
    }

    public function editProfile(Request $req, $id)
    {
        $dtP = User::find($id);
        //dd($dtP);
        $dtP->fullname = $req->fullname;
        $dtP->phone = $req->phone;
        $dtP -> save();
        return view('user.profile.index',compact('dtP'));
    }

    public function task()
    {

        //$dtTask = Task::all();
        //dd($dtP);
        $id=auth::user();
        //dd($id->id);
        $dtTask = DB::table('rooms')
            ->join('tasks', 'tasks.room_id', '=', 'rooms.id')
            ->where('tasks.id','=',$id->id)
    		->get();
        return view('user.task.index',compact('dtTask'));
    }

    public function updateTask($id)
    {
        $Task = Task::find($id);
        $Task -> status = 0;
        $Task -> save();
        $dtTask = Task::all();
        return redirect()->route('user.task',compact('dtTask'));
    }
}
