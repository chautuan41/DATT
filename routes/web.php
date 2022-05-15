<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminController;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/page-login',[AdminController::class,'loginAD'])->name('login-ad');
Route::post('/page-login', [AdminController::class,'xuLyloginAD'])->name('xl-login-ad');
///// Index Admin /////

Route::get('/index-admin',[AdminController::class,'indexAD'])->name('index-ad');

