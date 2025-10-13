<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\MovieCategory;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    // View 1: Menampilkan semua film (Homepage)
    public function index()
{
    $movies = Movie::latest()->paginate(12);
    
    // PASTIKAN BARIS INI ADA DAN BENAR
    // Key-nya adalah 'movies' (plural)
    return view('movies.index', ['movies' => $movies]);
}

    // View 2: Menampilkan detail satu film (Pengganti Pop-up)
    public function show(Movie $movie)
{
    // Eager load relasi 'userReviews' untuk efisiensi query
    $movie->load('userReviews');

    // Hitung jumlah review
    $reviewCount = $movie->userReviews->count();

    // Hitung rata-rata rating, hindari pembagian dengan nol jika tidak ada review
    $averageRating = $reviewCount > 0 ? $movie->userReviews->avg('rating') : 0;

    // Kirim data movie beserta data review ke view
    return view('movies.show', [
        'movie' => $movie,
        'reviewCount' => $reviewCount,
        'averageRating' => $averageRating,
    ]);
}



// View 3: Menampilkan daftar semua kategori
public function categories()
{
    $categories = MovieCategory::all();
    return view('movies.category', ['categories' => $categories]);
    }

    // View 4: Menampilkan film berdasarkan kategori
    // app/Http/Controllers/MovieController.php

public function showByCategory(MovieCategory $category)
{
    $movies = $category->movies()->paginate(12);

    // PASTIKAN BARIS INI ADA DAN BENAR
    return view('movies.by_category', [
        'category' => $category,
        'movies' => $movies // Key-nya harus 'movies'
    ]);
}

    // View 5: Halaman About (Contoh halaman statis)
    public function about()
    {
        return view('pages');
    }

    
}

