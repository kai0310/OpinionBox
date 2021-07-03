<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\MyPostAction;
use App\Http\Controllers\Post\AllPostAction;
use App\Http\Controllers\Profile\ShowAction;
use App\Http\Controllers\Admin;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::group(['middleware' => 'auth'], function() {
    Route::view('/faq', 'other.faq')->name('faq');
    Route::view('/guide', 'other.guide')->name('guide');
    Route::view('/about', 'other.about')->name('about');
    Route::get('/post/all', AllPostAction::class)->name('post.all');
    Route::get('/post/me', MyPostAction::class)->name('post.me');
    Route::resource('/post', PostController::class, [
        'only' => ['index', 'create', 'show',]
    ]);
    Route::get('/users/@{user:name}', ShowAction::class)->name('user.show');
});

Route::middleware(['auth', 'can:admin'])
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', Admin\IndexAction::class)->name('index');
    });
