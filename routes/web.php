<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/category/{slug}',[FrontendController::class,'viewCategory']);
Route::get('/category/{cate_slug}/{pro_slug}',[FrontendController::class,'productDetails']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/cart',[CartController::class, 'showCart']);
});

Route::post('add-to-cart',[CartController::class,'addProductToCart']);
Route::post('delete-cart-item',[CartController::class,'deleteProductFromCart']);

// new versions
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});
