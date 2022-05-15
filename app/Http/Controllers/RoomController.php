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

class RoomController extends Controller
{
    public function tableRoom($id){
        $lsRoom = Room::all();
        return view('dashboard.room-table',compact('lsRoom','id'));
    }
}
