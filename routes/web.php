<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageRoomController;
use App\Http\Controllers\MessageController;

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

Route::post('post/{post}/createMessageRoom', [MessageRoomController::class, 'store'])->name('createMessageRoom.store')->where(['post' => '[0-9]+']);

Route::get('post/{messageRoom}/message', [MessageController::class, 'index'])->name('message.index')->where(['messageRoom' => '[0-9]+']);
Route::post('post/{messageRoom}/createMessage', [MessageController::class, 'store'])->name('message.store')->where(['messageRoom' => '[0-9]+']);


Auth::routes();
