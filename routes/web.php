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
use App\Http\Controllers\RatingReviewController;
use App\Http\Controllers\RoommatesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserProfileController;
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
//user profile routes
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/profile', [UserProfileController::class, 'index'])->name('index');
    Route::get('/profile/{id}/edit', [UserProfileController::class, 'edit'])->name('edit');
    Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('update');
});

Route::get('/searchItems', [HomeController::class, 'search'])->name('search-items');
Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
Route::get('/roommates', [RoommatesController::class, 'index'])->name('roommates');
Route::get('/post-ads', [PostAdsController::class, 'index'])->name('postAds');
Route::resource('/reviews', RatingReviewController::class);
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
    Route::get('/ad-requests', [AdminAdsController::class, 'adRequests'])->name('ad-requests');
    Route::get('/ad-requests/edit/{id}', [AdminAdsController::class, 'editAdRequests'])->name('ad-requests.edit');
    Route::put('/ad-requests/update/{id}', [AdminAdsController::class, 'updateAdRequests'])->name('ad-requests.update');
    Route::resource('/users', AdminUsersController::class);
    Route::resource('/room-types', RoomTypeController::class);
});

//Google login routes
Route::get('/auth/google/redirect',[GoogleController::class, 'handleGoogleRedirect'])->name('google');
Route::get('/auth/google/callback',[GoogleController::class, 'handleGoogleCallback']);
//Facebook login routes
Route::get('/auth/facebook/redirect',[FacebookController::class, 'handleFacebookRedirect'])->name('facebook');
Route::get('/auth/facebook/callback',[FacebookController::class, 'handleFacebookCallback']);