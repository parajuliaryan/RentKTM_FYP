<?php

use App\Http\Controllers\AdminAdsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminRoommatesController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
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
});

Auth::routes();
//auth middleware for authenticated user, isAdmin for admin 
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/rooms', AdminRoomController::class);
    Route::resource('/roommates', AdminRoommatesController::class);
    Route::resource('/ads', AdminAdsController::class);
});

//Google login routes
Route::get('/auth/google/redirect',[GoogleController::class, 'handleGoogleRedirect'])->name('google');
Route::get('/auth/google/callback',[GoogleController::class, 'handleGoogleCallback']);
//Facebook login routes
Route::get('/auth/facebook/redirect',[FacebookController::class, 'handleFacebookRedirect'])->name('facebook');
Route::get('/auth/facebook/callback',[FacebookController::class, 'handleFacebookCallback']);