<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostListController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::controller(WelcomeController::class)->group(function(){
    Route::get('/', 'index')->name('welcome');
});

/* Route::controller(HomeController::class)->prefix('home')->name('home.')->group(function(){
    
}); */

// ログインしているか、ユーザーステータスが有効であるかチェック
Route::middleware(['auth'])->group(function () {
    Route::controller(PostListController::class)->prefix('post_list')->name('post_list.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('search', 'search')->name('search');
    });
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

require __DIR__.'/auth.php';
