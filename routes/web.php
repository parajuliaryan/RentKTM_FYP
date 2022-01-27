<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin routes
Route::middleware(['auth','isAdmin'])->group(function(){
    
});

//Google login routes
Route::get('/auth/google/redirect',[GoogleController::class, 'handleGoogleRedirect'])->name('google');
Route::get('/auth/google/callback',[GoogleController::class, 'handleGoogleCallback']);
//Facebook login routes
Route::get('/auth/facebook/redirect',[FacebookController::class, 'handleFacebookRedirect'])->name('facebook');
Route::get('/auth/facebook/callback',[FacebookController::class, 'handleFacebookCallback']);