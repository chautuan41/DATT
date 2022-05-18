<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

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

    function create($id)
    {
        $dtR = Room::find($id);
        $dtG = DB::table('grades')->where('status','=','1')->get();
        $dtT = DB::table('teachers')->where('status','=','1')->get();
        
        return view('user.create',compact('dtR','dtG','dtT'));
    }

    function showCreate(Request $req){
        $Inv = new Inventory();
        $Inv->user_id = $req->user;
        $Inv->room_id = $req->room;
        $Inv->teacher_id = $req->teacher;
        $Inv->grade_id = $req->grade;
        $Inv->date = $req->date;
        $Inv->shifts = $req->shifts;
        $Inv->material_facilities = $req->material_facilities;
        $Inv->hardware_error = $req->hardware_error;
        $Inv->software_error = $req->software_error;
        $Inv->status = $req->status;
        $Inv -> save();
        $dtInv = Inventory::all();
       return redirect()->route('inventory',compact('dtInv'));
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
