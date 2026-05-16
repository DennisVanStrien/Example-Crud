<?php

use Illuminate\Support\Facades\Route;

Route::get('/bears', [App\Http\Controllers\BearController::class, 'index'])->name('bears.index');
Route::get('/bears/create', [App\Http\Controllers\BearController::class, 'create'])->name('bears.create');
Route::post('/bears', [App\Http\Controllers\BearController::class, 'store'])->name('bears.store');
Route::delete('/bears/{bear}', [App\Http\Controllers\BearController::class, 'destroy'])->name('bears.destroy');
Route::get('/bears/{id}', [App\Http\Controllers\BearController::class, 'show'])->name('bears.show');
Route::get('/bears/{id}/edit', [App\Http\Controllers\BearController::class, 'edit'])->name('bears.edit');
Route::put('/bears/{id}', [App\Http\Controllers\BearController::class, 'update'])->name('bears.update');
