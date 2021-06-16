<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/home/crate', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::get('/home/memo/show/{id}', [App\Http\Controllers\MemoController::class, 'show'])->name('memo.show');

Route::post('/home/memo/create/{id}', [App\Http\Controllers\MemoController::class, 'create'])->name('memo.create');

Route::get('/home/memo/destroy/{id}', [App\Http\Controllers\MemoController::class, 'destroy'])->name('memo.destroy');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
