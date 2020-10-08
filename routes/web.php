<?php

use App\Http\Controllers\AdvanceUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

//View blade
Route::get('/view-blade', function () {
    return view('View Blade Exercise.content');
});

//Query_Builder
Route::group(['prefix' => '/posts'], function () {
    Route::get('/list', [PostController::class, 'list'])->name('posts_list');
    Route::post('/store', [PostController::class, 'store'])->name('post_store');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('post_update');
    Route::put('/delete/{id}', [PostController::class, 'delete'])->name('post_delete');
});

Route::get('/404', function () {
    return view('404');
});

//Eloquent ORM
Route::get('/search-user', [UserController::class, 'index'])->name('search.index');

Route::get('/search-results', [UserController::class, 'search'])->name('search.result');

Route::get('/search-advance-user', [AdvanceUserController::class, 'index'])->name('search.advance.index');

Route::get('/search-advance-results', [AdvanceUserController::class, 'search_advance'])->name('search.advance.result');

