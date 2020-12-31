<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
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


Route::view('/faq', 'other.faq')->name('faq');
Route::view('/guide', 'other.guide')->name('guide');
Route::view('/about', 'other.about')->name('about');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/post/all', [PostController::class, 'all'])->name('post.all');
    Route::get('/post/me', [PostController::class, 'me'])->name('post.me');
    Route::get('/post/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('post.show');
    Route::resource('/post', PostController::class, [
        'only' => ['index', 'create', 'show',]
    ]);
});

Route::middleware(['auth', 'can:admin'])
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [Admin\IndexController::class, 'index'])->name('index');
    });
