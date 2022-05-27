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

class GradeController extends Controller
{
    public function tableGrade(){
        $lsGrade = Grade::all();
        return view('dashboard.grade-table',compact('lsGrade'));
    }
    public function deleteLsGrade($id_grade){
        $grade = Grade::find($id_grade);
        $grade->status = 0;
        $grade->save();
        $dsGrade = Grade::all();
        return redirect()->route('table-grade');
    }
    public function formUpdateGrade($id_grade){
        $dsGrade = Grade::find($id_grade);
        return view('dashboard.update.form-update-grade',compact('id_grade','dsGrade'));
    }

    public function updateGrade(Request $request,$id_grade){
        $updateGrade = Grade::find($id_grade);
        $updateGrade->grade_name = $request->grade_name;
        $updateGrade->save();
        //$upgrade = Grade::find($id_grade);
        return redirect()->route('table-grade');
    }
    public function formCreateGrade(){
        return view('dashboard.create.form-create-grade');
    }
    public function createGrade(Request $request){
        $grade = Grade::where('grade_name',$request->grade_name)->first();
        if($grade == true){
            return redirect()->back()->with("error","Lớp đã tồn tại.");
        }
        $gr = new Grade();
        $gr->grade_name = $request->grade_name;
        $gr->status = 1;
        $gr->save();
        return redirect()->back()->with("success","Thêm lớp thành công!");
    }
    public function searchGrade(){
        $search_text=$_GET['query'];
        $grade=Grade::where('grade_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.search-grade',compact('grade'));
    }
}
