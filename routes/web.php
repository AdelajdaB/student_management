<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Companies
Route::prefix('companies')->middleware('auth')->name('companies.')->group(base_path('routes/web/companies.php'));

//Employees
Route::prefix('employees')->middleware('auth')->name('employees.')->group(base_path('routes/web/employees.php'));
