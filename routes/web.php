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

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Students
Route::prefix('students')->middleware('auth')->name('students.')->group(base_path('routes/web/students.php'));

// Courses
Route::prefix('courses')->middleware('auth')->name('courses.')->group(base_path('routes/web/courses.php'));