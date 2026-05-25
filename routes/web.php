<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/bears', [App\Http\Controllers\BearController::class, 'index'])->name('bears.index');
Route::get('/bears/create', [App\Http\Controllers\BearController::class, 'create'])->name('bears.create');
Route::post('/bears', [App\Http\Controllers\BearController::class, 'store'])->name('bears.store');
Route::delete('/bears/{bear}', [App\Http\Controllers\BearController::class, 'destroy'])->name('bears.destroy');
Route::get('/bears/{id}', [App\Http\Controllers\BearController::class, 'show'])->name('bears.show');
Route::get('/bears/{id}/edit', [App\Http\Controllers\BearController::class, 'edit'])->name('bears.edit');
Route::put('/bears/{id}', [App\Http\Controllers\BearController::class, 'update'])->name('bears.update');

// Notes CRUD
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
Route::post('/notes/{note}/attach-user', [NoteController::class, 'attachUser'])->name('notes.attachUser')->middleware('auth');

require __DIR__.'/auth.php';
