<?php

use App\Http\Controllers\AdminAdsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminRoommatesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostAdsController;
use App\Http\Controllers\RoommatesController;
use App\Http\Controllers\RoomsController;
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
    return view('home');
})->name('home');

Auth::routes();
//auth middleware for authenticated user, isAdmin for admin
Route::get('/profile', [HomeController::class, 'profile'])->name('profile'); 
Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
Route::get('/roommates', [RoommatesController::class, 'index'])->name('roommates');
Route::get('/post-ads', [PostAdsController::class, 'index'])->name('postAds');
Route::prefix('post-ads')->name('post-ads.')->group(function(){
    Route::get('/',[PostAdsController::class , 'index'])->name('index');
    Route::resource('/rooms', RoomsController::class);
    Route::resource('/roommates', RoommatesController::class);
});

//Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/rooms', AdminRoomController::class);
    Route::resource('/roommates', AdminRoommatesController::class);
    Route::resource('/ads', AdminAdsController::class);
    Route::resource('/users', AdminUsersController::class);
});

//Google login routes
Route::get('/auth/google/redirect',[GoogleController::class, 'handleGoogleRedirect'])->name('google');
Route::get('/auth/google/callback',[GoogleController::class, 'handleGoogleCallback']);
//Facebook login routes
Route::get('/auth/facebook/redirect',[FacebookController::class, 'handleFacebookRedirect'])->name('facebook');
Route::get('/auth/facebook/callback',[FacebookController::class, 'handleFacebookCallback']);