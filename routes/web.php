<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * SITE
 */
Route::get('/', App\Http\Controllers\HomeController::class)->name('home');
Route::get('voluntario', [App\Http\Controllers\VolunteerController::class, 'create'])->name('volunteer.create');
Route::post('voluntario', [App\Http\Controllers\VolunteerController::class, 'store'])->name('volunteer.store');
