<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;

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

Route::get('/', [HomeController::class,'home'])->name('home');

Route::get('/redirect',[HomeController::class,'index']);

Route::get('/tests',[HomeController::class,'tests'])->name('tests');

Route::get('store/{id}',[HomeController::class,'store']);

Route::post('order',[HomeController::class,'order'])->name('order');

Route::get('checkout',[HomeController::class,'checkout']);

Route::get('stored/{client_id}/{product_id}',[HomeController::class,'detail']);

Route::get('store/{client_id}/{category_id}/{product_id}',[HomeController::class,'detail2']);

Route::get('store/{client_id}/{category_id}/',[HomeController::class,'categories']);

Route::get('addcart/{id}',[HomeController::class,'addcart']);

Route::get('reduce/{id}',[HomeController::class,'getreduce']);

Route::get('removeall/{id}',[HomeController::class,'getremoveall']);

Route::get('cart',[HomeController::class,'cart']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'stores' => StoreController::class,
        'orders' =>OrderController::class,
    ]);
});
