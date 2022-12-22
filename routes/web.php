<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// old versions
// Route::group(['middleware' => ['auth','admin']],function(){
//     Route::get('/dashboard', function(){
//         return view('admin.dashboard');
//     });
// });

// new versions
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});
