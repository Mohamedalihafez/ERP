<?php

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
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

Route::get('/',[LayoutController::class,'home'])->name('home');

Route::get('/about',[LayoutController::class,'about'])->name('about');


Route::get('/sign-up',[LayoutController::class,'register'])->name('sign-up');

Route::get('/pricing',[LayoutController::class,'pricing'])->name('pricing');

Auth::routes();

Route::group(['prefix' => 'contact'],function () {
    Route::get('/',[ContactController::class,'index'])->name('contact');
    Route::post('/modify',[ContactController::class,'modify'])->name('contact.modify');
});

Route::get('send-email-pdf', [ContactController::class, 'pdf']);


Route::group(['prefix' => 'register'],function () {
    Route::get('/',[RegisterController::class,'personal'])->name('register.personal');
    Route::post('personal/data',[RegisterController::class,'personalData'])->name('register.personal.data');
    Route::get('/confirm',[RegisterController::class,'confirm'])->name('register.confirm');
    Route::post('/save/verification',[RegisterController::class,'verification'])->name('verification.save');
    Route::get('/verify/verification',[RegisterController::class,'verificationCheck'])->name('verification.check');
    Route::get('/register-success',[RegisterController::class,'registersucess'])->name('register.success.information');
});

Route::group(['prefix' => 'forget-password','middleware' => 'guest'],function () {
    Route::get('/',[ResetPasswordController::class,'getPhone'])->name('forget.password');
    Route::post('/reset',[ResetPasswordController::class,'postphone'])->name('resetpaswword');
    Route::get('/confirm',[ResetPasswordController::class,'confirm'])->name('reset.confirm');
    Route::post('/save/verification',[ResetPasswordController::class,'verification'])->name('reset.verification.save');
    Route::get('/reset-success/verification',[ResetPasswordController::class,'verfiyPassword'])->name('reset.success');
    Route::get('/reset/verify/verification',[ResetPasswordController::class,'verificationCheck'])->name('reset.verification.check');
    Route::post('/changepassword',[ResetPasswordController::class,'changepassword'])->name('changepassword');
});

Route::get('/reset',[UserController::class,'reset'])->name('user.reset');
Route::post('/add-password',[UserController::class,'addpassword'])->name('user.changepassword');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

