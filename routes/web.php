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

Route::get('/room/{id}',[RoomController::class,'tableRoom'])->name('table-room');

Route::get('/grade/{id}',[GradeController::class,'tableGrade'])->name('table-grade');

Route::get('/teacher/{id}',[TeacherController::class,'tableTeacher'])->name('table-teacher');

Route::get('/user/{id}',[UserController::class,'tableUser'])->name('table-user');

//Route::get('/task/{id}',[TaskController::class,'tableTask'])->name('table-task');

//login user
Route::get('/user-login',[LoginController::class,'index'])->name('user.login');
Route::post('/user-login', [LoginController::class,'customLogin'])->name('user.login.post');
Route::get('/logout', [LoginController::class,'signOut'])->name('user.logout');

Route::get('/home',[HomeController::class,'index'])->name('user.home');
Route::group(['middleware' => ['auth:web']], function () {
    
});


Auth::routes();


