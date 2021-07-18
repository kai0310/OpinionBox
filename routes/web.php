<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\MyPostAction;
use App\Http\Controllers\Post\AllPostAction;
use App\Http\Controllers\Profile\ShowAction;
use App\Http\Controllers\ShowAnnouncementListAction;
use App\Http\Controllers\Stuff;
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

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('faq', 'other.faq')->name('faq');
    Route::view('guide', 'other.guide')->name('guide');
    Route::view('about', 'other.about')->name('about');
    Route::get('/announcements', ShowAnnouncementListAction::class)->name('announcements.index');
    Route::get('post/all', AllPostAction::class)->name('post.all');
    Route::get('post/me', MyPostAction::class)->name('post.me');
    Route::resource('post', PostController::class, [
        'only' => ['index', 'create', 'show',]
    ]);
    Route::get('users/@{user}', ShowAction::class)->name('user.show');
});

Route::middleware(['auth', 'can:stuff'])
    ->prefix('/stuff')
    ->name('stuff.')
    ->group(function () {
        Route::get('/', Stuff\IndexAction::class)->name('index');
    });

Route::middleware(['auth', 'can:admin'])
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', Admin\IndexAction::class)->name('index');
        Route::get('/users', Admin\ManageUsersController::class)->name('manage.users');
        Route::get('/roles', Admin\ManageRolesAction::class)->name('manage.roles');
        Route::view('/application-config', 'admin/application-config')->name('application-config');
    });
