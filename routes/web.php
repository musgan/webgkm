<?php

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

Route::get("/",[\App\Http\Controllers\WelcomeController::class,"index"]);
Route::get("/post/{category}",[\App\Http\Controllers\PostController::class,"index"]);
Route::get("/post/detail/{slug}",[\App\Http\Controllers\PostController::class,"detail"]);

Auth::routes([
    'register' => false,'reset' => false,'showRegistrationForm' => false,
    'showConfirmForm'=>false,'confirm' => false]);

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
