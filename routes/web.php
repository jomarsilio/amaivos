<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;

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
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('voluntario', [VolunteerController::class, 'create'])->name('volunteer.create');
    Route::post('voluntario', [VolunteerController::class, 'store'])->name('volunteer.store');
});
