<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AdminMovieController;

/* Public */

// Halaman Home
Route::get('/', [MovieController::class, 'home'])->name('home');

// Halaman Daftar Semua Film (dengan search)
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// Halaman Detail Film
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

// Halaman Daftar Kategori
Route::get('/categories', [MovieCategoryController::class, 'categories'])->name('movies.categories');

// Halaman Film berdasarkan Kategori
Route::get('/category/{id}', [MovieCategoryController::class, 'showByCategory'])->name('movies.by_category');

// Halaman About Us
Route::get('/about', [MovieController::class, 'about'])->name('about');


/* Rute Autentikasi Pengguna */
Route::middleware('auth')->group(function () {
    
    // Halaman Dashboard (yang dicari Breeze setelah login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Submit Review Film
    Route::post('/movie/{movie}/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
    // Menghapus Review
    Route::delete('/reviews/{review}', [UserReviewController::class, 'destroy'])->name('reviews.destroy');
});

// internal Breeze (login, register, logout, reset password, dll.)
require __DIR__.'/auth.php';


/* Admin */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Arahkan dashboard admin ke daftar film
    Route::get('/dashboard', [AdminMovieController::class, 'index'])->name('dashboard');
    
    // CRUD lengkap untuk mengelola film
    Route::resource('movies', AdminMovieController::class);

     // CRUD untuk mengelola user
    Route::resource('users', AdminUserController::class)->except(['create', 'store', 'show']);
});