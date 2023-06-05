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

//HomePage
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//EventUp
Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
Route::get('/event/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::get('/event/{id}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');

Route::post('/event', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
Route::delete('/event/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
Route::put('/event/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');

//NoteHub
Route::get('/note', [App\Http\Controllers\NoteController::class, 'index'])->name('notes.index');
Route::get('/note/create', [App\Http\Controllers\NoteController::class, 'create'])->name('notes.create');
Route::get('/note/{id}', [App\Http\Controllers\NoteController::class, 'show'])->name('notes.show');
Route::get('/note/{id}/edit', [App\Http\Controllers\NoteController::class, 'edit'])->name('notes.edit');

Route::post('/note', [App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
Route::delete('/note/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('notes.destroy');
Route::put('/note/{id}', [App\Http\Controllers\NoteController::class, 'update'])->name('notes.update');

//FlashCard (Decks)
Route::get('/deck', [App\Http\Controllers\DeckController::class, 'index'])->name('decks.index');

//FlashCard (Cards)
Route::get('/card', [App\Http\Controllers\CardController::class, 'index'])->name('cards.index');

//Profile
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
