<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{public function index() {
        $movies = Movie::with('movieCategory')->latest()->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create() {
        $categories = MovieCategory::all();
        return view('admin.movies.create', compact('categories'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'release_date' => 'required|date',
            'movie_category_id' => 'required|integer|exists:movie_categories,id',
            'poster_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $request->file('poster_image')->store('posters', 'public');

        Movie::create($validated + ['poster_url' => $path]);

        return redirect()->route('admin.movies.index')->with('success', 'Movie created.');
    }

    public function edit(Movie $movie) {
        $categories = MovieCategory::all();
        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'release_date' => 'required|date',
            'movie_category_id' => 'required|integer|exists:movie_categories,id',
            'poster_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $movie->poster_url;
        if ($request->hasFile('poster_image')) {
            if ($movie->poster_url && !Str::startsWith($movie->poster_url, 'http')) {
                Storage::disk('public')->delete($movie->poster_url);
            }
            $path = $request->file('poster_image')->store('posters', 'public');
        }

        $movie->update($validated + ['poster_url' => $path]);
        return redirect()->route('admin.movies.index')->with('success', 'Movie updated.');
    }

    public function destroy(Movie $movie) {
        if ($movie->poster_url && !Str::startsWith($movie->poster_url, 'http')) {
            Storage::disk('public')->delete($movie->poster_url);
        }
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted.');
    }
}
