<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('{user_id}', [UserController::class, 'show'])
    ->where('user_id', '[0-9]+')
    ->name('user.show');

Route::get('posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::group(['as' => 'post.', 'where' => ['user_id' => '[0-9]+']], function () {
    Route::get('{user_id}/post/{post_id}', [PostController::class, 'show'])
        ->where('post_id', '[0-9]+')
        ->name('show');
    Route::get('{user_id}/post/create', [PostController::class, 'create'])
        ->name('create');
    Route::post('post/store', [PostController::class, 'store'])
        ->name('store');
    Route::get('{user_id}/post/edit', [PostController::class, 'edit'])
        ->name('edit');
    Route::patch('post/update', [PostController::class, 'update'])
        ->name('update');
    Route::delete('post/destroy', [PostController::class, 'destroy'])
        ->name('destroy');
});

Auth::routes();
