<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //
    function index()
    {
        $dtInv = DB::table('inventories')->where('status','=','1')->get();   
        return view('user.inventory.index',compact('dtInv'));
    }

    function create()
    {
        return view('user.inventory.create');
    }

    function showCreate(Request $req){
        $ProT = new Inventory();
        $ProT->product_types_name = $req->name;
        $ProT->status = 1;
        $ProT -> save();
        $dtProT = Inventory::all();
       return redirect()->route('Inventory',compact('dtProT'));
    }

 
    function edit($id)
    {
        $dt = Inventory::find($id);
        return view('admin.Inventory.edit',compact('dt'));
    }

    function showEdit(Request $req, $id){       
        $ProT = Inventory::find($id);
        $ProT->product_types_name = $req->name;
        $ProT->status = $req->status;
        $ProT -> save();
        $dtProT = Inventory::all();
       return redirect()->route('Inventory',compact('dtProT'));
    }

    function delete($id){       
        $ProT = Inventory::find($id);
        $ProT -> status = 0;
        $ProT -> save();
        $dtProT = DB::table('product_types')->where('status','=','1')->get();    
        return redirect()->route('Inventory',compact('dtProT'));
    } 
}
