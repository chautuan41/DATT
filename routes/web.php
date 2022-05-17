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
use App\HTTP\Controllers\InventoryController;

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

//Route::get('/task/{id}',[TaskController::class,'tableTask'])->name('table-task');

//login user
Route::get('/user-login',[LoginController::class,'index'])->name('user.login');
Route::post('/user-login', [LoginController::class,'customLogin'])->name('user.login.post');
Route::get('/logout', [LoginController::class,'signOut'])->name('user.logout');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/home',[HomeController::class,'index'])->name('user.home');
    Route::get('/create/{ID}',[HomeController::class, 'create'])->name('home.create');
    Route::post('/create',[HomeController::class, 'showCreate'])->name('inventory.create.post');
    Route::group(['prefix' => 'inventory'], function() {
        Route::get('/',[InventoryController::class, 'index'])->name('inventory');
        Route::get('create',[InventoryController::class, 'create'])->name('inventory.create');
        Route::post('create',[InventoryController::class, 'showCreate'])->name('inventory.create.post');
        Route::get('edit/{ID}',[InventoryController::class, 'edit'])->name('inventory.edit');
        Route::post('edit/{ID}',[InventoryController::class, 'showEdit'])->name('inventory.edit.post');
        Route::get('delete/{ID}',[InventoryController::class, 'delete'])->name('inventory.delete');
    });
});


Auth::routes();


