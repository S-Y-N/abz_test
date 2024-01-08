<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=>'App\Http\Controllers\Auth'],function (){
    Route::post('/register',[AuthenticationController::class,'register']);
    Route::post('/login',[AuthenticationController::class,'login']);
    Route::get('/',[IndexController::class,'getUsers']);
});
Route::middleware('auth:api')->group(function(){
    Route::post('/logout',[AuthenticationController::class,'logout']);
    Route::resource('products', ProductController::class);
});
