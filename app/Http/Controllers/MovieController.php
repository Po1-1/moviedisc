<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //untuk home
    public function home()
    {
        return view('home');
    }

    //list film
    public function index()
    {
        $movies = Movie::paginate(12);
        return view('movies.index', ['movies' => $movies]);
    }

    //untuk show detail
    public function show($id) 
    {
        //cari pake ID
        $movie = Movie::findOrFail($id);
        $movie->load('userReviews');
        $reviewCount = $movie->userReviews->count();
        $averageRating = $reviewCount > 0 ? $movie->userReviews->avg('rating') : 0;

        return view('movies.show', [
            'movie' => $movie,
            'reviewCount' => $reviewCount,
            'averageRating' => $averageRating,
        ]);
    }

    //buat list kategori
    public function categories()
    {
        $categories = MovieCategory::all();
        return view('movies.category', ['categories' => $categories]);
    }

    //nampilin film dari kategorinya
    public function showByCategory($id)
    {
        //nyari kategori pake id
        $category = MovieCategory::findOrFail($id);
        $movies = $category->movies()->get();
        return view('movies.by_category', [
            'category' => $category,
            'movies' => $movies,
        ]);
    }

    //about us
    public function about()
    {
        return view('about');
    }
}
