<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace'=>'App\Http\Controllers\Main'],function (){
    Route::get('/','IndexController')->name('main.index');
});
Route::get('/positions',[PositionController::class,'getPositions']);

Route::group(['namespace'=>'App\Http\Controllers\Auth'],function (){
    Route::get('/token',[AuthenticationController::class,'getToken']);
});
Route::group(['prefix'=>'city','namespace'=>'App\Http\Controllers\City'],function (){
    Route::get('/','IndexController')->name('city.index');
    Route::get('/create','CreateController')->name('city.create');
    Route::get('/search', 'SearchController')->name('city.search');
    Route::get('/{city}','ShowController')->name('city.show');
    Route::post('/','StoreController')->name('city.store');
    Route::get('/{city}/edit','EditController')->name('city.edit');
    Route::patch('/{city}','UpdateController')->name('city.update');
    Route::delete('/{city}','DeleteController')->name('city.delete');
});
Route::group(['prefix'=>'country','namespace'=>'App\Http\Controllers\Country'],function (){
    Route::get('/','IndexController')->name('country.index');
    Route::get('/create','CreateController')->name('country.create');
    Route::get('/search', 'SearchController')->name('country.search');
    Route::get('/{country}','ShowController')->name('country.show');
    Route::post('/','StoreController')->name('country.store');
    Route::get('/{country}/edit','EditController')->name('country.edit');
    Route::patch('/{country}','UpdateController')->name('country.update');
    Route::delete('/{country}','DeleteController')->name('country.delete');
});
Route::group(['prefix'=>'users','namespace'=>'App\Http\Controllers\User'],function (){
    Route::get('/','IndexController')->name('user.index');
    Route::get('/create','CreateController')->name('user.create');
    Route::get('/search/', 'SearchController')->name('user.search');
    Route::get('/{user}','ShowController')->name('user.show');
    Route::post('/','StoreController')->name('user.store');
    Route::get('/{user}/edit','EditController')->name('user.edit');
    Route::patch('/{user}','UpdateController')->name('user.update');
    Route::delete('/{user}','DeleteController')->name('user.delete');
    Route::get('/{user}/token',[AuthenticationController::class,'getToken']);
});
