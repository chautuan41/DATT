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

class TeacherController extends Controller
{
    public function tableTeacher(){
        $lsTeacher = Teacher::all();
        return view('dashboard.teacher-table',compact('lsTeacher'));
    }
    public function deleteLsTeacher($id_teacher){
        $teacher = Teacher::find($id_teacher);
        $teacher->status = 0;
        $teacher->save();
        $dsTeacher = Teacher::all();
        return redirect()->route('table-teacher');
    }
    public function formUpdateTeacher($id_teacher){
        $dsTeacher = Teacher::find($id_teacher);
        return view('dashboard.update.form-update-teacher',compact('id_teacher','dsTeacher'));
    }

    public function updateTeacher(Request $request,$id_teacher){
        $updateTeacher = Teacher::find($id_teacher);
        $updateTeacher->teacher_name = $request->teacher_name;
        $updateTeacher->save();
        //$upteacher = Teacher::find($id_teacher);
        //return redirect()->route('table-teacher',['id'=>$upteacher]);
        return redirect()->route('table-teacher');
    }
    public function formCreateTeacher(){
        return view('dashboard.create.form-create-teacher');
    }
    public function createTeacher(Request $request){
        $teacher = Teacher::where('teacher_name',$request->teacher_name)->first();
        if($teacher == true){
            return redirect()->back()->with("error","Giảng viên đã tồn tại.");
        }
        $t = new Teacher();
        $t->teacher_name = $request->teacher_name;
        $t->status = 1;
        $t->save();
        return redirect()->back()->with("success","Thêm giảng viên thành công!");
    }
    public function searchTeacher(){
        $search_text=$_GET['query'];
        $teacher=Teacher::where('teacher_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.search-teacher',compact('teacher'));
    }
}
