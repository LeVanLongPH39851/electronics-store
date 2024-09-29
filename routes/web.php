<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AuthController;
use App\Http\Controllers\Admins\ColorController;
use App\Http\Controllers\Admins\Categories\CategoryController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\StaffController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\ShopController;
use App\Http\Controllers\Clients\LoginController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\SsdController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Admins\Trashs\UserTrashController;
use App\Http\Controllers\Admins\Trashs\StaffTrashController;

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
Route::middleware(['admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::post('/user-trash/trash', [UserTrashController::class, 'trash'])->name('user.trash');
        Route::post('/user-trash/delete', [UserTrashController::class, 'delete'])->name('user.delete');
        Route::post('/user-trash/restore', [UserTrashController::class, 'restore'])->name('user.restore');
        Route::resource('/user-trash', UserTrashController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/categories', CategoryController::class);
        Route::middleware(['staff'])->group(function () {
            Route::post('/staff-trash/trash', [StaffTrashController::class, 'trash'])->name('staff.trash');
            Route::post('/staff-trash/delete', [StaffTrashController::class, 'delete'])->name('staff.delete');
            Route::post('/staff-trash/restore', [StaffTrashController::class, 'restore'])->name('staff.restore');
            Route::resource('/staff-trash', StaffTrashController::class);
            Route::resource('/staff', StaffController::class);
        });
        //------------------------------ quản lý thuộc tính màu sắc---------------------------------------------------------
        Route::get('/color', [ColorController::class, 'index'])->name('color.index');
        Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/color/store', [ColorController::class, 'store'])->name('color.store');
        Route::get('/color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/color/update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::delete('/color/delete/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
        // ------------------------------quản lý thuộc tính dung lượng-------------------------------------------------------
        Route::get('/ssd', [SsdController::class, 'index'])->name('ssd.index');
        Route::get('/ssd/create', [SsdController::class, 'create'])->name('ssd.create');
        Route::post('/ssd/store', [SsdController::class, 'store'])->name('ssd.store');
        Route::get('/ssd/edit/{id}', [SsdController::class, 'edit'])->name('ssd.edit');
        Route::post('/ssd/update/{id}', [SsdController::class, 'update'])->name('ssd.update');
        Route::delete('/ssd/delete/{id}', [SsdController::class, 'destroy'])->name('ssd.destroy');
    });
});

// route client
Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/login', [LoginController::class, 'login'])->name('client.login');
Route::get('/signup', [LoginController::class, 'signup'])->name('client.signup');
Route::get('/logout', [LoginController::class, 'logout'])->name('client.logout');
Route::post('/store', [LoginController::class, 'store'])->name('client.store');
Route::post('/store-signup', [LoginController::class, 'storeSignup'])->name('client.store.signup');
Route::get('/shop', [ShopController::class, 'shop'])->name('client.shop');
Route::get('/product-detail', [ProductDetailController::class, 'productDetail'])->name('client.product.detail');
Route::get('/cart', [CartController::class, 'cart'])->name('client.cart');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('client.checkout');
Route::get('/account', [AccountController::class, 'account'])->name('client.account');
Route::get('/order-detail', [AccountController::class, 'orderDetail'])->name('client.order.detail');
Route::get('/thanh-cong', [AccountController::class, 'thanhCong'])->name('client.order.thanhtoan');
