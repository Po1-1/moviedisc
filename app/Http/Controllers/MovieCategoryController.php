<?php

namespace App\Http\Controllers;
use App\Models\MovieCategory;
use Illuminate\Http\Request;

class MovieCategoryController extends Controller
{
    // Halaman Daftar Kategori
    public function categories() {
        $categories = MovieCategory::all();
        return view('movies.category', ['categories' => $categories]); // Anda sudah punya view 'category'
    }

    // Halaman Daftar Film per Kategori
    public function showByCategory($id) {
        $category = MovieCategory::findOrFail($id);
        $movies = $category->movies()->paginate(12);
        return view('movies.by_category', [
            'category' => $category,
            'movies' => $movies,
        ]); // Anda sudah punya view 'by_category'
    }
}

