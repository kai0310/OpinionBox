<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;

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

Route::get('/faq', function () {
    return Inertia\Inertia::render('Other/Faq');
})->name('Faq');

Route::get('/guide', function () {
    return Inertia\Inertia::render('Other/Guide');
})->name('Guide');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::resource('/post', PostController::class)
        ->names(['index'=>'post.index',
        'create' => 'post.create',
        'edit' => 'post.edit',
        'update' => 'post.update',
        'destroy' => 'post.destroy',
        'store'=>'post.store'])
    ->middleware(['auth']);


