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
Route::post('/tasks/{task}/start', [TaskController::class, 'start'])->name('tasks.start');
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
