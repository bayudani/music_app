<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('welcome');
// });

Route::get('/', [MusicController::class, 'index']);


Route::get('/songs', [MusicController::class, 'index'])->name('songs');
Route::get('/features', [MusicController::class, 'features'])->name('features');
Route::get('/about', [MusicController::class, 'about'])->name('about');
Route::get('/contact', [MusicController::class, 'contact'])->name('contact');
Route::get('/search', [MusicController::class, 'search'])->name('music.search');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// halaman artis
Route::get('/artists', [ArtistController::class, 'index'])->name('artist');

// halaman musik
// Route::get('/music', [MusicController::class, 'index'])->name('music');
// Route::get('/music', [MusicController::class, 'index'])->name('music.index');
Route::get('/music/{id}', [MusicController::class, 'show'])->name('music.show');

require __DIR__ . '/auth.php';
