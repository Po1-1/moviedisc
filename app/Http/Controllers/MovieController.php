<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //untuk home
    public function home() {
        return view('home'); 
    }

    // Halaman Daftar Semua Film (dengan SEARCH)
    public function index(Request $request) {
        $query = Movie::query()->latest(); 

        // searching
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
        }
        // Paginate
        $movies = $query->paginate(12)->appends($request->query());

        return view('movies.index', ['movies' => $movies]);
    }

    // Halaman Detail Film
    public function show($id) {
        $movie = Movie::findOrFail($id);
        // relasi user di dalam review
        $movie->load('userReviews.user'); 

        $reviewCount = $movie->userReviews->count();
        $averageRating = $reviewCount > 0 ? $movie->userReviews->avg('rating') : 0;
        
        return view('movies.show', [
            'movie' => $movie,
            'reviewCount' => $reviewCount,
            'averageRating' => $averageRating,
        ]);
    }

    // About
    public function about() {
        return view('about'); 
    }
}

