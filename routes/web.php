<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});
// Rute utama ke halaman daftar film
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

// Rute untuk detail film
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movies.show');

// Rute untuk daftar kategori
Route::get('/categories', [MovieController::class, 'categories'])->name('movies.categories');

// Rute untuk film per kategori
Route::get('/category/{category}', [MovieController::class, 'showByCategory'])->name('movies.by_category');

// Rute untuk halaman 'About Us'
Route::get('/about', [MovieController::class, 'about'])->name('pages.about');
