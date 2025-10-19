<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

// home
Route::get('/', [MovieController::class, 'home'])->name('home');

// list film
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// detail film
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movies.show');

// list kategori
Route::get('/categories', [MovieController::class, 'categories'])->name('movies.categories');

// film per kategori
Route::get('/category/{category}', [MovieController::class, 'showByCategory'])->name('movies.by_category');

// About Us
Route::get('/about', [MovieController::class, 'about'])->name('about');
