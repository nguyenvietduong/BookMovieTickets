<?php

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

Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.home');


Route::get('/home',                         [App\Http\Controllers\HomeController::class,            'index'])->name('home');

Route::get('/movie-grid/{slug}',            [App\Http\Controllers\MovieGridController::class,       'index'])->where(['slug' => '[a-zA-Z0-9-_]+'])->name('movie.grid');

Route::get('/movie-details/{slug}',         [App\Http\Controllers\MovieDetailController::class,     'index'])->where(['slug' => '[a-zA-Z0-9-_]+'])->name('movie.details');

Route::get('/contact',                      [App\Http\Controllers\ContactController::class,         'index'])->name('contact');

Route::get('/blog',                         [App\Http\Controllers\BlogController::class,            'index'])->name('blog');
