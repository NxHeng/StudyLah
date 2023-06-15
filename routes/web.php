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
Route::get('/note/preview/{id}', [App\Http\Controllers\NoteController::class, 'preview'])->name('notes.preview');
Route::get('/note/{id}/edit', [App\Http\Controllers\NoteController::class, 'edit'])->name('notes.edit');

Route::post('/note', [App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
Route::delete('/note/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('notes.destroy');
Route::put('/note/{id}', [App\Http\Controllers\NoteController::class, 'update'])->name('notes.update');


//FlashCard (Decks)
Route::get('/deck', [App\Http\Controllers\DeckController::class, 'index'])->name('decks.index');
Route::get('/deck/create', [App\Http\Controllers\DeckController::class, 'create'])->name('decks.create');

Route::post('/deck', [App\Http\Controllers\DeckController::class, 'store'])->name('decks.store');
Route::delete('/deck/{id}', [App\Http\Controllers\DeckController::class, 'destroy'])->name('decks.destroy');

//FlashCard (Cards)
Route::get('/deck/{id}/card', [App\Http\Controllers\CardController::class, 'index'])->name('cards.index');
Route::get('/deck/{id}/card/create', [App\Http\Controllers\CardController::class, 'create'])->name('cards.create');
Route::get('/deck/{id}/card/study', [App\Http\Controllers\CardController::class, 'study'])->name('cards.study');

Route::post('/deck/{id}/card', [App\Http\Controllers\CardController::class, 'store'])->name('cards.store');
Route::delete('/deck/{id}/card/{card_id}', [App\Http\Controllers\CardController::class, 'destroy'])->name('cards.destroy');


//Profile
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/{id}', [App\Http\Controllers\profileController::class, 'update'])->name('profile.update');
