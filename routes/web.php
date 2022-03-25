<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    if (Session::has('users')) {
        return view('home');
    } else {
        return view('login');
    }
});

Route::get('/home', function () {
    Session::has('users');
    return view('home');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/editmyuser', function () {
    return view('edituser');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/userlist', function () {
    return view('viewuser');
});

Route::post('/userlist',[UserController::class,'search']);

Route::get('/userlist',[UserController::class,'listuser']);

Route::get('/userdelete',[UserController::class,'deleteuser']);

Route::post('/register',[UserController::class,'register']);

Route::get('/editmyuser',[UserController::class,'getuser']);

Route::post('/login',[UserController::class,'login']);

Route::post('/useredit',[UserController::class,'edituser']);

Route::post('/home',[UserController::class,'home']);