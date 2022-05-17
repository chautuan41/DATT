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
}
