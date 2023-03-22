<?php

use App\Http\Controllers\Employees\EmployeesController;


//Employees

Route::get('/', [EmployeesController::class, 'index'])->name('dashboard');
Route::get('create', [EmployeesController::class, 'create'])->name('create');
Route::get('{employee}/edit', [EmployeesController::class, 'edit'])->name('edit');
Route::delete('{employee}', [EmployeesController::class, 'destroy'])->where('employee', '[0-9]+')->name('delete');

Route::post('/', [EmployeesController::class, 'store'])->name('store');
Route::put('{employee}', [EmployeesController::class, 'update'])->where('employee', '[0-9]+')->name('update');