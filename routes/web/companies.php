<?php

use App\Http\Controllers\Companies\CompaniesController;

//Companies

Route::get('/', [CompaniesController::class, 'index'])->name('dashboard');
Route::get('create', [CompaniesController::class, 'create'])->name('create');
Route::get('{company}/edit', [CompaniesController::class, 'edit'])->name('edit');
Route::get('{company}', [CompaniesController::class, 'show'])->where('company', '[0-9]+')->name('show');
Route::put('{company}/logo', [CompaniesController::class, 'updateProfileLogo'])->where('company', '[0-9]+')->name('update.logo');
Route::delete('{company}', [CompaniesController::class, 'destroy'])->where('company', '[0-9]+')->name('delete');
Route::delete('{company}/logo', [CompaniesController::class, 'destroyLogo'])->where('company', '[0-9]+')->name('delete.logo');


Route::post('/', [CompaniesController::class, 'store'])->name('store');
Route::put('{company}', [CompaniesController::class, 'update'])->where('company', '[0-9]+')->name('update');