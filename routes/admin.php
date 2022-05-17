<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->
    name('login-ad');
    Route::post('login', [Admin\LoginController::class, 'login'])->
    name('xl-login-ad');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->
    name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('admin.dashboard');

        Route::get('/room',[Admin\RoomController::class,'tableRoom'])->name('table-room');

        Route::get('/grade',[Admin\GradeController::class,'tableGrade'])->name('table-grade');

        Route::get('/teacher',[Admin\TeacherController::class,'tableTeacher'])->name('table-teacher');

        Route::get('/staff',[Admin\UserController::class,'tableUser'])->name('table-user');
    });
    
});