<?php

use App\Http\Controllers\Admins\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\LoginController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Clients\ShopController;

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
Route::get('/shop', [ShopController::class, 'shop'])->name('client.shop');
Route::get('/product-detail', [ProductDetailController::class, 'productDetail'])->name('client.product.detail');
Route::get('/cart', [CartController::class, 'cart'])->name('client.cart');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('client.checkout');
Route::get('/account', [AccountController::class, 'account'])->name('client.account');
Route::get('/order-detail', [AccountController::class, 'orderDetail'])->name('client.order.detail');