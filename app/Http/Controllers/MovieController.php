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
        $movies = Movie::latest()->paginate(12); // Ambil 12 film terbaru per halaman
        return view('movies.index', ['movies' => $movies]);
    }

    // View 2: Menampilkan detail satu film (Pengganti Pop-up)
    public function show(Movie $movie)
    {
        return view('movies.show', ['movie' => $movie]);
    }

    // View 3: Menampilkan daftar semua kategori
    public function categories()
    {
        $categories = MovieCategory::all();
        return view('movies.category', ['categories' => $categories]);
    }

    // View 4: Menampilkan film berdasarkan kategori
    public function showByCategory(MovieCategory $category)
    {
        $movies = $category->movies()->paginate(12);
        return view('movies.by_category', [
            'movies' => $movies,
            'category' => $category
        ]);
    }

    // View 5: Halaman About (Contoh halaman statis)
    public function about()
    {
        return view('pages.about');
    }
}
