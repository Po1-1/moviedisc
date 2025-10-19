<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{

    // buat home
    public function home()
    {
        return view('home');
    }

    // buat nampilin list film
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('movies.index', ['movies' => $movies]);
    }

    // ke show detail
    public function show(Movie $movie)
    {
        $movie->load('userReviews');
        $reviewCount = $movie->userReviews->count();
        $averageRating = $reviewCount > 0 ? $movie->userReviews->avg('rating') : 0;
        return view('movies.show', [
            'movie' => $movie,
            'reviewCount' => $reviewCount,
            'averageRating' => $averageRating,
        ]);
    }

    // untuk list kategori
    public function categories()
    {
        $categories = MovieCategory::all();
        return view('movies.category', ['categories' => $categories]);
    }

    // list film dari kategori
    public function showByCategory(MovieCategory $category)
    {
        $movies = $category->movies()->get();
        return view('movies.by_category', [
            'category' => $category,
            'movies' => $movies
        ]);
    }

    // buat about
    public function about()
    {
        return view('about');
    }
}
