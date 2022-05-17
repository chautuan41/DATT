<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;

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
        $dtT = DB::table('teachers')->where('status','=','1')->get();
        $dtG = DB::table('grades')->where('status','=','1')->get();
        return view('user.create',compact('dtR'),compact('dtT'),compact('dtG'));
    }

    function showCreate(Request $req){
        $ProT = new Inventory();
        $ProT->product_types_name = $req->name;
        $ProT->status = 1;
        $ProT -> save();
        $dtProT = Inventory::all();
       return redirect()->route('Inventory',compact('dtProT'));
    }
}
