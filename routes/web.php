<?php

use App\Http\Controllers\Admins\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\LoginController;

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
    return view('welcome');
});

// form login admin
Route::get('/admin', [AuthController::class, 'index'])->name('admin.login')->middleware('logged');
Route::post('/admin/store', [AuthController::class, 'store'])->name('admin.store');

// route admin
Route::middleware(['admin'])->group(function(){
Route::prefix('/admin')->group(function(){
    Route::get('/index', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/logout',[AuthController::class, 'logout'])->name('admin.logout');
    Route::resource('/user', UserController::class);
});
});

// route client
Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/login', [LoginController::class, 'login'])->name('client.login');
Route::get('/signup', [LoginController::class, 'signup'])->name('client.signup');
Route::post('/store', [LoginController::class, 'store'])->name('client.store');
Route::post('/store-signup', [LoginController::class, 'storeSignup'])->name('client.store.signup');
Route::get('/logout', [LoginController::class, 'logout'])->name('client.logout');