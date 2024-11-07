<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('task_statuses', TaskStatusController::class)
    ->except('index', 'show')
    ->middleware('auth');
Route::resource('task_statuses', TaskStatusController::class)
    ->only('index', 'show');

Route::resource('tasks', TaskController::class)
    ->except('index', 'show')
    ->middleware('auth');
Route::resource('tasks', TaskController::class)
    ->only('index', 'show');

Route::resource('labels', LabelController::class)
    ->except('index', 'show')
    ->middleware('auth');
Route::resource('labels', LabelController::class)
    ->only('index', 'show');

require __DIR__ . '/auth.php';
