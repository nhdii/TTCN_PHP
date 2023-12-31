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
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;

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

Route::patch('/admin/orders/approve/{order}', [OrderController::class, 'approve'])->name('orders.approve');
Route::patch('/admin/orders/update-delivery-date/{order}', [OrderController::class, 'updateDeliveryDate'])->name('orders.update-delivery-date');


//Route của trang Home
Route::get('/', [ProductController::class, 'showNikeHome'])->name('index');
Route::get('/show/{product_id}', [ProductController::class, 'showDetailProduct'])->name('show');
Route::get('/feature', [ProductController::class, 'showFeature'])->name('feature');
Route::get('/men_products', [ProductController::class, 'showMenProducts'])->name('men_products');
Route::get('/women_products', [ProductController::class, 'showWoMenProducts'])->name('women_products');
Route::get('/kid_products', [ProductController::class, 'showKidProducts'])->name('kid_products');
Route::get('/home/by_brand/{brand_id}', [ProductController::class, 'showProductsByBrand'])->name('home.by_brand');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/filter-products', [ProductController::class, 'filterProducts'])->name('filter-products');

Route::get('/search-suggestions', [SearchController::class, 'searchSuggestions']);


//Kiểm tra login nếu true: vào, false: thoát về home
Route::middleware('checkLogin')->group(function(){
    Route::get('profile', [ProfileUserController::class, 'showProfile'])->name('show-profile');
    Route::get('profile/edit', [ProfileUserController::class, 'edit'])->name('edit-profile');
    Route::post('profile/edit', [ProfileUserController::class, 'update'])->name('update-profile');
    Route::get('logout', [AuthManagerController::class, 'logout'])->name('logout');
    Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);

});

// cart route
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::post('/cart/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/increase', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/cart/decrease', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::post('/cart/remove', [CartController::class, 'removeItemFromCart'])->name('removeItemFromCart');
Route::get('/cart/callback', [CartController::class, 'handlePaymentCallback'])->name('handlePaymentCallback');

//Route đăng ký đăng nhập
Route::get('register', [AuthManagerController::class, 'showRegistration'])->name('show-registration');
Route::post('register', [AuthManagerController::class, 'register'])->name('register');
Route::get('login', [AuthManagerController::class, 'showLogin'])->name('show-login');
Route::post('login', [AuthManagerController::class, 'login'])->name('login');
