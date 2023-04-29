<?php 
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ContactController;





/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These`
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/
Route::post('/upload/temp',[AdminController::class,'uploadImageInTemp'])->name('upload.temp');
Route::post('/delete/temp',[AdminController::class,'removeImageInTemp'])->name('delete.temp');

Route::group(['prefix' => '/'],function(){
    Route::get('/', [AdminController::class,"dashboard"])->name('dashboard');
    Route::get('/data', [AdminController::class,"getData"])->name('data-dashboard');
});

Route::group(['prefix' => 'user'],function(){
    Route::get('/', [UserController::class,"index"])->name('user');
    Route::get('/upsert/{user?}',[UserController::class,'upsert'])->name('user.upsert');
    Route::get('/send-email-pdf/{user?}', [ContactController::class, 'pdf'])->name('user.report');
    Route::get('/filter',[UserController::class,'filter'])->name('user.filter');
    Route::post('/delete/{user}',[UserController::class,'destroy'])->name('user.delete');
    Route::post('/modify',[UserController::class,'modify'])->name('user.modify');
    Route::get('/reset',[UserController::class,'reset'])->name('user.reset');
    Route::post('/status/update',[UserController::class,'status'])->name('user.status');
    Route::post('/add-password',[UserController::class,'addpassword'])->name('user.changepassword');
});



Route::group(['prefix' => 'product'],function(){
    Route::get('/', [ProductController::class,"index"])->name('product');
    Route::get('/upsert/{product?}',[ProductController::class,'upsert'])->name('product.upsert');
    Route::get('/filter',[ProductController::class,'filter'])->name('product.filter');
    Route::post('/modify',[ProductController::class,'modify'])->name('product.modify');
    Route::post('/delete/{product}',[ProductController::class,'destroy'])->name('product.delete');
});

Route::group(['prefix' => 'order'],function(){
    Route::get('/', [OrderController::class,"index"])->name('order');
    Route::get('/upsert/{order?}',[OrderController::class,'upsert'])->name('order.upsert');
    Route::get('/filter',[OrderController::class,'filter'])->name('order.filter');
    Route::post('/order/price',[OrderController::class,'getPrice'])->name('order.price');
    Route::post('/modify',[OrderController::class,'modify'])->name('order.modify');
    Route::post('/delete/{order}',[OrderController::class,'destroy'])->name('order.delete');
});


Route::group(['prefix' => 'profile'],function(){
    Route::get('/', [ProfileController::class,"index"])->name('profile');
    Route::post('/update', [ProfileController::class,"update"])->name('profile.update');
});

