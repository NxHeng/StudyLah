<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');
Route::get('/note', [App\Http\Controllers\NoteController::class, 'index'])->name('note');
Route::get('/card', [App\Http\Controllers\CardController::class, 'index'])->name('card');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
