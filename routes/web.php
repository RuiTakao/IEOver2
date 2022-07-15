<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageRoomController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostSearchController;

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

/** '/' にアクセスされたら '/posts' にリダイレクトする */
Route::redirect('/', 'posts');

/** user ページ関係の route */
Route::get('{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('user.show');

/** posts 一覧ページへのroute */
Route::get('posts', [PostController::class, 'index'])
    ->name('posts.index');

/** post 関係のroute */
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

/** messageRoom を作る route */
Route::post('post/{post}/createMessageRoom', [MessageRoomController::class, 'store'])
    ->name('createMessageRoom.store')
    ->where(['post' => '[0-9]+']);

/** message 関係の route */
Route::group([
    'as' => 'message.',
    'where' => ['messageRoom' => '[0-9]+']
    ], function () {
        Route::get('post/{messageRoom}/message', [MessageController::class, 'index'])->name('index');
        Route::post('post/{messageRoom}/createMessage', [MessageController::class, 'store'])->name('store');
});

/** search ページへのルート */
Route::get('search' ,[PostSearchController::class, 'search'])
    ->name('posts.search');

/** auth 関係の route */
Auth::routes();
