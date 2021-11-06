<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatchingController;
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

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
});

Auth::routes();

Route::get('/', function () {
    return view('top');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/matching', [MatchingController::class, 'index'])->name('matching');

Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
    Route::post('show', [ChatController::class, 'show'])->name('chat.show');
    Route::post('chat', [ChatController::class, 'chat'])->name('chat.chat');
});
