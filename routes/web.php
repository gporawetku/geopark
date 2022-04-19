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

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\FrontEndController::class, 'home'])->name('home');
Route::get('/programme', [App\Http\Controllers\FrontEndController::class, 'programme'])->name('programme');
Route::get('/registration', [App\Http\Controllers\FrontEndController::class, 'registration'])->name('registration');
Route::get('/abstract', [App\Http\Controllers\FrontEndController::class, 'abstract'])->name('abstract');
Route::get('/geofair', [App\Http\Controllers\FrontEndController::class, 'geofair'])->name('geofair');
Route::get('/gallery', [App\Http\Controllers\FrontEndController::class, 'gallery'])->name('gallery');
Route::get('/blog', [App\Http\Controllers\FrontEndController::class, 'blogList'])->name('blog.list');
Route::get('/blog/{id}', [App\Http\Controllers\FrontEndController::class, 'blogShow'])->name('blog.show');


//Admin
Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::resource('blogs', App\Http\Controllers\BlogController::class);
Route::resource('slides', App\Http\Controllers\SlideController::class);
Route::resource('banners', App\Http\Controllers\BannerController::class);
Route::resource('schedules', App\Http\Controllers\ScheduleController::class);
Route::resource('information', App\Http\Controllers\InformationController::class);
Route::resource('geoparks', App\Http\Controllers\GeoparkController::class);
Route::resource('geopark_images', App\Http\Controllers\GeoparkImageController::class);
