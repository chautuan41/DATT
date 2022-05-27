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

class RoomController extends Controller
{
    public function tableRoom(){
        $lsRoom = Room::all();
        return view('dashboard.room-table',compact('lsRoom'));
    }
    public function deleteLsRoom($id_room){
        $room = Room::find($id_room);
        $room->status = 0;
        $room->save();
        $dsRoom = Room::all();
        return redirect()->route('table-room');
    }
    public function formUpdateRoom($id_room){
        $dsRoom = Room::find($id_room);
        return view('dashboard.update.form-update-room',compact('id_room','dsRoom'));
    }

    public function updateRoom(Request $request,$id_room){
        $updateRoom = Room::find($id_room);
        $updateRoom->room_name = $request->room_name;
        $updateRoom->save();
        //$uproom = Room::find($id_room);
        return redirect()->route('table-room');
    }
    public function formCreateRoom(){
        return view('dashboard.create.form-create-room');
    }
    public function createRoom(Request $request){
        $room = Room::where('room_name',$request->room_name)->first();
        if($room == true){
            return redirect()->back()->with("error","Phòng máy đã tồn tại.");
        }
        $r = new Room();
        $r->room_name = $request->room_name;
        $r->status = 1;
        $r->save();
        return redirect()->back()->with("success","Thêm phòng máy thành công!");
    }
    public function searchRoom(){
        $search_text=$_GET['query'];
        $room=Room::where('room_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.search-room',compact('room'));
    }
}
