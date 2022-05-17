<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminController;
use App\HTTP\Controllers\RoomController;
use App\HTTP\Controllers\GradeController;
use App\HTTP\Controllers\TeacherController;
use App\HTTP\Controllers\UserController;
use App\HTTP\Controllers\TaskController;
use App\HTTP\Controllers\LoginController;
use App\HTTP\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



Route::get('/page-login',[AdminController::class,'loginAD'])->name('login-ad');
Route::post('/page-login', [AdminController::class,'xuLyloginAD'])->name('xl-login-ad');

///// Index Admin /////
Route::get('/index-admin',[AdminController::class,'indexAD'])->name('index-ad');
//// Table List
Route::get('/room',[RoomController::class,'tableRoom'])->name('table-room');
Route::get('/grade',[GradeController::class,'tableGrade'])->name('table-grade');
Route::get('/teacher',[TeacherController::class,'tableTeacher'])->name('table-teacher');
Route::get('/staff',[UserController::class,'tableUser'])->name('table-user');
//Route::get('/task/{id}',[TaskController::class,'tableTask'])->name('table-task');

//Delete
Route::get('/delete-room/{id_room}',[RoomController::class,'deleteLsRoom'])->name('delete-room');
Route::get('/delete-grade/{id_grade}',[GradeController::class,'deleteLsGrade'])->name('delete-grade');
Route::get('/delete-teacher/{id_teacher}',[TeacherController::class,'deleteLsTeacher'])->name('delete-teacher');
Route::get('/delete-staff/{id_user}',[UserController::class,'deleteLsStaff'])->name('delete-staff');

//Update
Route::get('/update-room/{id_room}',[RoomController::class,'formUpdateRoom'])->name('form-update-room');
Route::post('/update-room/{id_room}',[RoomController::class,'updateRoom'])->name('update-room');

Route::get('/update-grade/{id_grade}',[GradeController::class,'formUpdateGrade'])->name('form-update-grade');
Route::post('/update-grade/{id_grade}',[GradeController::class,'updateGrade'])->name('update-grade');

Route::get('/update-teacher/{id_teacher}',[TeacherController::class,'formUpdateTeacher'])->name('form-update-teacher');
Route::post('/update-teacher/{id_teacher}',[TeacherController::class,'updateTeacher'])->name('update-teacher');

Route::get('/update-staff/{id_user}',[UserController::class,'formUpdateStaff'])->name('form-update-staff');
Route::post('/update-staff/{id_user}',[UserController::class,'updateStaff'])->name('update-staff');


//Create
Route::get('/create-room',[RoomController::class,'formCreateRoom'])->name('form-create-room');
Route::post('/create-room',[RoomController::class,'createRoom'])->name('create-room');

Route::get('/create-grade',[GradeController::class,'formCreateGrade'])->name('form-create-grade');
Route::post('/create-grade',[GradeController::class,'createGrade'])->name('create-grade');

Route::get('/create-teacher',[TeacherController::class,'formCreateTeacher'])->name('form-create-teacher');
Route::post('/create-teacher',[TeacherController::class,'createTeacher'])->name('create-teacher');

Route::get('/create-staff',[UserController::class,'formCreateStaff'])->name('form-create-staff');
Route::post('/create-staff',[UserController::class,'createStaff'])->name('create-staff');

///// Information Profile /////
Route::get('/admin/profile/{id}',[AdminController::class,'formProfile'])->name('form-profile');
Route::post('/admin/profile/{id}',[AdminController::class,'updateProfile'])->name('handle-update-profile');
///// Change Password /////
Route::get('/admin/change-password/{id}',[AdminController::class,'formChangePassword'])->name('form-change-password');
Route::post('/admin/change-password/{id}',[AdminController::class,'updatePassword'])->name('handle-change-password');

// Search
Route::get('admin/search-grade',[GradeController::class,'searchGrade'])->name('search-grade');
Route::get('admin/search-room',[RoomController::class,'searchRoom'])->name('search-room');

//login user
Route::get('/user-login',[LoginController::class,'index'])->name('user.login');
Route::post('/user-login', [LoginController::class,'customLogin'])->name('user.login.post');
Route::get('/logout', [LoginController::class,'signOut'])->name('user.logout');

Route::get('/home',[HomeController::class,'index'])->name('user.home');
Route::group(['middleware' => ['auth:web']], function () {
    
});


//Auth::routes();


