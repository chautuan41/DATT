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
        ///// Index Admin /////
        Route::get('/',[Admin\AdminController::class,'indexAD'])->name('index-ad');
        //// Table List
        Route::get('/room',[Admin\RoomController::class,'tableRoom'])->name('table-room');
        Route::get('/grade',[Admin\GradeController::class,'tableGrade'])->name('table-grade');
        Route::get('/teacher',[Admin\TeacherController::class,'tableTeacher'])->name('table-teacher');
        Route::get('/staff',[Admin\UserController::class,'tableUser'])->name('table-user');


        Route::get('/task',[Admin\TaskController::class,'index'])->name('Task');
        Route::get('/task/create',[Admin\TaskController::class,'showCreate'])->name('task.create');
        Route::post('/task/create',[Admin\TaskController::class,'create'])->name('task.create.post');
        Route::get('/task/inventory',[Admin\TaskController::class,'inventory'])->name('task.inventory');
        Route::get('/task/inventory/{ID}',[Admin\TaskController::class,'confirm'])->name('task.confirm');

        //Delete
        Route::get('/delete-room/{id_room}',[Admin\RoomController::class,'deleteLsRoom'])->name('delete-room');
        Route::get('/delete-grade/{id_grade}',[Admin\GradeController::class,'deleteLsGrade'])->name('delete-grade');
        Route::get('/delete-teacher/{id_teacher}',[Admin\TeacherController::class,'deleteLsTeacher'])->name('delete-teacher');
        Route::get('/delete-staff/{id_user}',[Admin\UserController::class,'deleteLsStaff'])->name('delete-staff');

        //Update
        Route::get('/update-room/{id_room}',[Admin\RoomController::class,'formUpdateRoom'])->name('form-update-room');
        Route::post('/update-room/{id_room}',[Admin\RoomController::class,'updateRoom'])->name('update-room');

        Route::get('/update-grade/{id_grade}',[Admin\GradeController::class,'formUpdateGrade'])->name('form-update-grade');
        Route::post('/update-grade/{id_grade}',[Admin\GradeController::class,'updateGrade'])->name('update-grade');

        Route::get('/update-teacher/{id_teacher}',[Admin\TeacherController::class,'formUpdateTeacher'])->name('form-update-teacher');
        Route::post('/update-teacher/{id_teacher}',[Admin\TeacherController::class,'updateTeacher'])->name('update-teacher');

        Route::get('/update-staff/{id_user}',[Admin\UserController::class,'formUpdateStaff'])->name('form-update-staff');
        Route::post('/update-staff/{id_user}',[Admin\UserController::class,'updateStaff'])->name('update-staff');


        //Create
        Route::get('/create-room',[Admin\RoomController::class,'formCreateRoom'])->name('form-create-room');
        Route::post('/create-room',[Admin\RoomController::class,'createRoom'])->name('create-room');

        Route::get('/create-grade',[Admin\GradeController::class,'formCreateGrade'])->name('form-create-grade');
        Route::post('/create-grade',[Admin\GradeController::class,'createGrade'])->name('create-grade');

        Route::get('/create-teacher',[Admin\TeacherController::class,'formCreateTeacher'])->name('form-create-teacher');
        Route::post('/create-teacher',[Admin\TeacherController::class,'createTeacher'])->name('create-teacher');

        Route::get('/create-staff',[Admin\UserController::class,'formCreateStaff'])->name('form-create-staff');
        Route::post('/create-staff',[Admin\UserController::class,'createStaff'])->name('create-staff');

        ///// Information Profile /////
        Route::get('/profile/{id}',[Admin\AdminController::class,'formProfile'])->name('form-profile');
        Route::post('/profile/{id}',[Admin\AdminController::class,'updateProfile'])->name('handle-update-profile');
        ///// Change Password /////
        Route::get('/change-password/{id}',[Admin\AdminController::class,'formChangePassword'])->name('form-change-password');
        Route::post('/change-password/{id}',[Admin\AdminController::class,'updatePassword'])->name('handle-change-password');

        // Search
        Route::get('search-grade',[Admin\GradeController::class,'searchGrade'])->name('search-grade');
        Route::get('search-room',[Admin\RoomController::class,'searchRoom'])->name('search-room');
        Route::get('search-teacher',[Admin\TeacherController::class,'searchTeacher'])->name('search-teacher');
        Route::get('search-user',[Admin\UserController::class,'searchUser'])->name('search-user');
        });
    
            
});