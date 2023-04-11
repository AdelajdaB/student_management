<?php

use App\Http\Controllers\Students\StudentsController;

//Students

Route::get('/', [StudentsController::class, 'index'])->name('dashboard');
Route::get('create', [StudentsController::class, 'create'])->name('create');
Route::get('{student}/edit', [StudentsController::class, 'edit'])->name('edit');
Route::get('{student}', [StudentsController::class, 'show'])->where('student', '[0-9]+')->name('show');
Route::delete('{student}', [StudentsController::class, 'destroy'])->where('student', '[0-9]+')->name('delete');


Route::post('/', [StudentsController::class, 'store'])->name('store');
Route::put('{student}', [StudentsController::class, 'update'])->where('student', '[0-9]+')->name('update');