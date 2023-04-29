<?php

use App\Http\Controllers\ApiController\SpecializationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'specialization'],function(){
    Route::post('/data',[SpecializationController::class,'specializationData'])->name('specialization-data');
    Route::post('/delete',[SpecializationController::class,'specializationDelete'])->name('specialization-delete');

});
