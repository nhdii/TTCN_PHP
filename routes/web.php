<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\AuthManagerController;
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

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('adminIndex');

    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('detail_orders', DetailOrderController::class);
    Route::resource('product_attributes', ProductAttributeController::class);

});

Route::get('/', [ProductController::class, 'homeIndex'])->name('index');
Route::get('/show/{product_id}', [ProductController::class, 'showHome'])->name('show');
Route::get('/feature', [ProductController::class, 'showFeature'])->name('feature');

//Check login -> true: vào, false: thoát về home
Route::middleware('checkLogin')->group(function(){
    Route::get('logout', [AuthManagerController::class, 'logout'])->name('logout');
});
Route::get('register', [AuthManagerController::class, 'showRegistration'])->name('show-registration');
Route::post('register', [AuthManagerController::class, 'register'])->name('register');
Route::get('login', [AuthManagerController::class, 'showLogin'])->name('show-login');
Route::post('login', [AuthManagerController::class, 'login'])->name('login');
