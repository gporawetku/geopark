<?php

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/blogContent', [App\Http\Controllers\BlogController::class, 'blogContent'])->name('blogContent');
Route::get('/otherGeoparks', [App\Http\Controllers\BlogController::class, 'otherGeoparks'])->name('otherGeoparks');
Route::get('/registerGeoparks', [App\Http\Controllers\BlogController::class, 'registerGeoparks'])->name('registerGeoparks');


//Admin
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('blogs', App\Http\Controllers\BlogController::class);
Route::resource('slides', App\Http\Controllers\SlideController::class);
Route::resource('banners', App\Http\Controllers\BannerController::class);
Route::resource('schedules', App\Http\Controllers\ScheduleController::class);
Route::resource('information', App\Http\Controllers\InformationController::class);
Route::resource('geoparks', App\Http\Controllers\GeoparkController::class);
Route::resource('geopark_images', App\Http\Controllers\GeoparkImageController::class);
