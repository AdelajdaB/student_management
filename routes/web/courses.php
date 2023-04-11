<?php

use App\Http\Controllers\Courses\CoursesController;

//Courses

Route::get('/', [CoursesController::class, 'index'])->name('dashboard');
Route::get('create', [CoursesController::class, 'create'])->name('create');
Route::get('{course}/edit', [CoursesController::class, 'edit'])->name('edit');
Route::get('{course}', [CoursesController::class, 'show'])->where('course', '[0-9]+')->name('show');
Route::delete('{course}', [CoursesController::class, 'destroy'])->where('course', '[0-9]+')->name('delete');


Route::post('/', [CoursesController::class, 'store'])->name('store');
Route::put('{course}', [CoursesController::class, 'update'])->where('course', '[0-9]+')->name('update');