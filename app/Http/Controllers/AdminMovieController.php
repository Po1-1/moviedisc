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

    public function store(Request $request)
{
    // cek valid or no
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'release_date' => 'required|date',
        'movie_category_id' => 'required|integer|exists:movie_categories,id',
        'poster_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // file gambar
    $path = $request->file('poster_image')->store('posters', 'public');
    
    // Siapin data untuk disimpan
    $dataToSave = $validated;
    
    // Hapus key 'poster_image' karena tidak ada di database
    unset($dataToSave['poster_image']); 
    
    // Tambahkan key 'poster_url' dengan path yang benar
    $dataToSave['poster_url'] = $path; 

    // Simpan data yang sudah bersih ke database
    Movie::create($dataToSave);

    return redirect()->route('admin.movies.index')->with('success', 'Movie created.');
}

    public function edit(Movie $movie) {
        $categories = MovieCategory::all();
        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
{
    // cek valid or no
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'release_date' => 'required|date',
        'movie_category_id' => 'required|integer|exists:movie_categories,id',
        'poster_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);
    
    // Siapin data untuk di-update
    $dataToUpdate = $validated;

    // Hapus key 'poster_image'
    unset($dataToUpdate['poster_image']);

    // Cek jika ada file gambar baru yang di-upload
    if ($request->hasFile('poster_image')) {
        // Hapus gambar lama (jika ada dan bukan dari seeder)
        if ($movie->poster_url && !Str::startsWith($movie->poster_url, 'http')) {
            Storage::disk('public')->delete($movie->poster_url);
        }
        // Simpan gambar baru dan tambahin path-nya ke data update
        $dataToUpdate['poster_url'] = $request->file('poster_image')->store('posters', 'public');
    }

    // Update movie dengan data yang sudah bersih
    $movie->update($dataToUpdate);
    
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
// tes
