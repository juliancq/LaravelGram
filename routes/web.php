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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*  Posts Routes */


Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('post.index');
Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('post.store');
Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post.create');
Route::get('/posts/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show');



/*  Profile Routes */

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

/* Followers Routes */

Route::post('/follows/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('follows.store');

