<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/category/{slug}',[FrontendController::class,'viewCategory']);
Route::get('/category/{cate_slug}/{pro_slug}',[FrontendController::class,'productDetails']);
Route::get('/contact',[ContactController::class,'contact']);

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class, 'showCart']);
    Route::get('checkout',[CheckoutController::class,'checkout']);
    Route::post('place-order',[CheckoutController::class, 'placeOrder']);
    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'viewOrder']);
});

Route::post('add-to-cart',[CartController::class,'addProductToCart']);
Route::post('delete-cart-item',[CartController::class,'deleteProductFromCart']);

// new versions
Route::middleware(['auth','admin'])->group(function(){

    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('view/{id}',[OrderController::class,'orderView']);
    Route::put('update-order/{id}',[OrderController::class,'updateOrder']);
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('users',[DashboardController::class,'users'])->name('dashboard.user');
    Route::get('view-user/{id}',[DashboardController::class,'viewUser']);
});
