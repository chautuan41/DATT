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
use Hash;

class TaskController extends Controller
{
     //
     public function index(){
          $dtTask = DB::table('tasks')->where('status','=','1')->get();
          return view('dashboard.task.index',compact('dtTask'));
     }

     public function showCreate(Request $req){
          $dtU = DB::table('users')->where('status','=','1')->get();
          $dtR = DB::table('rooms')->where('status','=','1')->get();
          return view('dashboard.task.create',compact('dtU','dtR'));
     }

     public function create(Request $req){
          $Task = new Task();
          $Task->admin_id = $req->admin;
          $Task->user_id = $req->user;
          $Task->room_id = $req->room;
          $Task->material_facilities = $req->material_facilities;
          $Task->hardware_error = $req->hardware_error;
          $Task->software_error = $req->software_error;
          $Task->status = 1;
          $Task -> save();
          $dtTask = Task::all();
          return redirect()->route('Task',compact('dtTask'));
     }

     public function showEdit($id){
          $dtTask = Task::find($id);
          return view('dashboard.task.edit',compact('dtTask'));
     }

     public function edit(Request $req, $id){
          $Task = Task::find($id);
          $Task->admin_id = $req->admin;
          $Task->user_id = $req->user;
          $Task->room_id = $req->room;
          $Task->material_facilities = $req->material_facilities;
          $Task->hardware_error = $req->hardware_error;
          $Task->software_error = $req->software_error;
          $Task->status = $req->status;
          $Task -> save();
          $dtTask = Task::all();
          return redirect()->route('Task',compact('dtTask'));
     }

     
     
}
