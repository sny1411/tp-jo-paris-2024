<?php

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportController;
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

Route::get('/', [HomeController::class, 'accueil'])->name('accueil');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/apropos', [HomeController::class, 'apropos'])->name('apropos');

Route::resource('sports', SportController::class);
Route::post('/sports/{id}/upload', [SportController::class, 'upload'])->name('sports.upload');

Route::resource('athletes', AthleteController::class);

Route::get('/home', function () {
    return view('dashboard', ['titre' => 'Dashboard']);
})->middleware(['auth'])->name('home');
