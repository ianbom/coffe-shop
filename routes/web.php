<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderJadiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    return view ('views2.home');
});

Route::get('/loginUser', function () {
    return view ('login.login');
});



Route::get('/reg', function () {
    return view ('login.register');
});

Route::get('/home', function () {
    return view ('views2.home');
});

Route::get('/menu', function () {
    return view ('views2.menu');
});

Route::get('/orderku', function () {
    return view ('views2.order');
});

Route::get('/orderdet', function () {
    return view ('views2.order_detail');
});

Route::get('/profileCard', function () {
    return view ('views2.profile');
});

Route::get('/admin_product', function () {
    return view ('product_admin');
});

Route::get('/create_product_admin', function () {
    return view ('product_create');
});

Route::get('/order_admin', function () {
    return view ('order_admin');
});

Route::get('/user_admin', function () {
    return view ('user_admin');
});

Route::get('/dashboard_admin', function () {
    return view ('dashboard_admin');
});

Route::get('/grafik', function () {
    return view ('grafik');
});









Auth::routes();

    // Admin Dashboard
    Route::get('/dashboard_admin', [DashboardController::class, 'total'])->name('total');
    Route::get('/', [HomeController::class, 'goHome'])->name('goHome');

    // Admin Product
    Route::get('/admin_product', [ProductController::class, 'index_product_admin'])->name('index_product_admin');
    Route::get('/admin_product/create', [ProductController::class, 'create_product_admin'])->name('create_product_admin');
    Route::post('/admin_product/create', [ProductController::class, 'store_product_admin'])->name('store_product_admin');
    Route::get('/admin_product/{product}/edit', [ProductController::class, 'edit_product_admin'])->name('edit_product_admin');
    Route::patch('/admin_product/{product}/update', [ProductController::class, 'update_product_admin'])->name('update_product_admin');
    Route::delete('/admin_product/{product}', [ProductController::class, 'delete_product_admin'])->name('delete_product_admin');

    // Admin Order
    Route::get('/order_admin', [OrderController::class, 'index_order_admin'])->name('index_order_admin');


    Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');

    Route::get('/product/category/{category}', [ProductController::class, 'showByCategory'])->name('product_by_category');


    // Admin User
    Route::get('/user_admin', [UserController::class, 'index_user'])->name('index_user');


    //HOME
    Route::get('/home', [HomeController::class, 'show_profile'])->name('show_profile');
    Route::get('/', [HomeController::class, 'show_profile'])->name('show_profile');
    Route::post('/home', [HomeController::class, 'edit_profile'])->name('edit_profile');

    //MENU
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
    Route::post('/menu/{product}', [MenuController::class, 'add_to_cart_menu'])->name('add_to_cart_menu');
    Route::patch('/menu/{cart}', [MenuController::class, 'update_cart_menu'])->name('update_cart_menu');
    Route::delete('/menu/{cart}', [MenuController::class, 'delete_cart_menu'])->name('delete_cart_menu');

    //Order
    Route::post('/checkoutku', [OrderJadiController::class, 'checkout_jadi'])->name('checkout_jadi');
    Route::get('/views2/order', [OrderJadiController::class, 'index_order_jadi'])->name('views2.order');
    Route::get('/ordersaya/{order}', [OrderJadiController::class, 'show_order_jadi'])->name('views2.order_detail');

    Route::get('/orderku', [OrderJadiController::class, 'index_order_jadi'])->name('index_order_jadi');
    Route::get('/orderku/{order}', [OrderJadiController::class, 'show_order_jadi'])->name('show_order_jadi');
    Route::post('/orderku/{order}/pay', [OrderJadiController::class, 'submit_payment_receipt_jadi'])->name('submit_payment_receipt_jadi');

    //PROFILE
  //  Route::get('/profileCard', [ProfileUserController::class, 'show_profile_user'])->name('show_profile_user');
   // Route::post('/profileCard', [ProfileUserController::class, 'edit_profile_user'])->name('edit_profile_user');

Route::middleware(['admin'])->group(function() {
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
    Route::get('/search', [ProductController::class, 'search'])->name('search'); //search
});

Route::middleware(['auth'])->group(function() {
    Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/search', [ProductController::class, 'search'])->name('search'); //search
});


