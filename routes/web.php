<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AdminMovieController;


Route::get('/', [MovieController::class, 'home'])->name('home');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/categories', [MovieCategoryController::class, 'categories'])->name('movies.categories');
Route::get('/category/{id}', [MovieCategoryController::class, 'showByCategory'])->name('movies.by_category');
Route::get('/about', [MovieController::class, 'about'])->name('about');


Route::middleware('auth')->group(function () {
    // Halaman Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Submit Review (buatan kita)
    Route::post('/movie/{movie}/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
});

// Rute Login/Register/Logout/dll (dari Breeze)
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Rute Admin (Dilindungi Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminMovieController::class, 'index'])->name('dashboard');
    Route::resource('movies', AdminMovieController::class);
});
require __DIR__.'/auth.php';
