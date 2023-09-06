<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

// Authentication Route){
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);


// //Admin Route
Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});


//User Route
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/user', [UserController::class, 'index']);
});
