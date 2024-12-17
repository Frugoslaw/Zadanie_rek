<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('tasks', TaskController::class)->middleware('auth');
