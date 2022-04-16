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

// Welcome
Route::get('/', [App\Http\Controllers\FontEndController::class, 'index'])->name('welcome');
// Home
Route::get('/home', [App\Http\Controllers\FontEndController::class, 'home'])->name('home');
// Programme
Route::get('/programme', [App\Http\Controllers\FontEndController::class, 'programme'])->name('programme');
// Registration
Route::get('/registration', [App\Http\Controllers\FontEndController::class, 'registration'])->name('registration');
// Abstract
Route::get('/abstract', [App\Http\Controllers\FontEndController::class, 'abstract'])->name('abstract');
// Geofair
Route::get('/geofair', [App\Http\Controllers\FontEndController::class, 'geofair'])->name('geofair');
// Gallery
Route::get('/gallery', [App\Http\Controllers\FontEndController::class, 'gallery'])->name('gallery');
// Blog
Route::get('/blog', [App\Http\Controllers\FontEndController::class, 'blogList'])->name('blog.list');
Route::get('/blog/{id}', [App\Http\Controllers\FontEndController::class, 'blogShow'])->name('blog.show');


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
