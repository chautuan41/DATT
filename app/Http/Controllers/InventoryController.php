<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Grade;
use App\Models\Teacher;


class InventoryController extends Controller
{
    //
    function index()
    {
        // $dtInv = DB::table('inventories')
        //     ->join('rooms', 'inventories.room_id', '=', 'rooms.id')
        //     ->join('teachers', 'inventories.teacher_id', '=', 'teachers.id')
        //     ->join('grades', 'inventories.grade_id', '=', 'grades.id')
        //     ->join('users', 'inventories.user_id', '=', 'users.id')
    	// 	->get();
        $dtInv = Inventory::all();
        return view('user.inventory.index',compact('dtInv'));
    }

    function create($id)
    {
        $dtR = Room::find($id);
        $dtG = DB::table('grades')->where('status','=','1')->get();
        $dtT = DB::table('teachers')->where('status','=','1')->get();
        
        return view('user.inventory.create',compact('dtR','dtG','dtT'));
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
       return redirect()->route('user.inventory',compact('dtInv'));
    }
 
    function showEdit($id)
    {
        $dt = Inventory::find($id);
        $dtG = DB::table('grades')->where('status','=','1')->get();
        $dtT = DB::table('teachers')->where('status','=','1')->get();
        $dtTid = Teacher::find($dt->teacher_id);
        $dtGid = Grade::find($dt->grade_id);
        return view('user.inventory.edit',compact('dt','dtG','dtT','dtTid','dtGid'));
    }

    function edit(Request $req, $id){       
        $Inv = Inventory::find($id);
        $Inv->teacher_id = $req->teacher;
        $Inv->grade_id = $req->grade;
        $Inv->date = $req->date;
        $Inv->shifts = $req->shifts;
        $Inv->material_facilities = $req->material_facilities;
        $Inv->hardware_error = $req->hardware_error;
        $Inv->software_error = $req->software_error;
        $Inv -> save();
        $dtInv = Inventory::all();
       return redirect()->route('user.inventory',compact('dtInv'));
    }

    function delete($id){       
        $ProT = Inventory::find($id);
        $ProT -> status = 0;
        $ProT -> save();
        $dtProT = DB::table('product_types')->where('status','=','1')->get();    
        return redirect()->route('Inventory',compact('dtProT'));
    } 
}
