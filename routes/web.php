<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostListController;
use App\Http\Controllers\CustomerListController;
use App\Http\Controllers\CustomerController;

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

// ログインしているかチェック
Route::middleware(['auth'])->group(function () {
    // 進捗一覧
    Route::controller(PostListController::class)->prefix('post_list')->name('post_list.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('search', 'search')->name('search');
    });
    // 荷主一覧
    Route::controller(CustomerListController::class)->prefix('customer_list')->name('customer_list.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('search', 'search')->name('search');
    });
    // 荷主
    Route::controller(CustomerController::class)->prefix('customer')->name('customer.')->group(function(){
        Route::get('register', 'register_index')->name('register_index');
        Route::post('register', 'register')->name('register');
        Route::get('modify', 'modify_index')->name('modify_index');
        Route::post('modify', 'modify')->name('modify');
        Route::get('delete', 'delete')->name('delete');
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
