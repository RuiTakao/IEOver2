<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

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
Route::redirect('/', 'posts');

Route::get('{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('user.show');

Route::get('posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::group([
    'as' => 'post.',
    'where' => ['post' => '[0-9]+']
    ], function () {
        Route::get('post/create', [PostController::class, 'create'])->name('create');
        Route::post('post/store', [PostController::class, 'store'])->name('store');
        Route::get('{user}/post/{post}', [PostController::class, 'show'])->name('show')->where(['user' => '[0-9]+']);
        Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('edit')->middleware('auth');
        Route::patch('post/{post}/update', [PostController::class, 'update'])->name('update');
        Route::delete('post/{post}/destroy', [PostController::class, 'destroy'])->name('destroy');
});

Route::group([
    'as' => 'chat.'
    ], function(){
        Route::get('chat/{user}/{post}', [ChatController::class, 'index'])->name('index');
        Route::post('chat/{post}/store', [ChatController::class, 'store'])->name('store');
});

Auth::routes();
