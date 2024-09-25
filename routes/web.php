<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard');

Route::get('/userdashboard', function () {
    return view('userdashboard');
})->middleware(['auth', 'verified'])->name('userdashboard');


Route::middleware('auth')->group(function () {

    Route::resource('todos', TodoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
