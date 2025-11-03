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
    // 1. Validasi (ini sudah benar)
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'release_date' => 'required|date',
        'movie_category_id' => 'required|integer|exists:movie_categories,id',
        'poster_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // 2. Simpan file gambar (ini sudah benar)
    $path = $request->file('poster_image')->store('posters', 'public');

    // --- PERBAIKAN DI SINI ---
    
    // 3. Siapkan data untuk disimpan
    $dataToSave = $validated;
    
    // 4. Hapus key 'poster_image' karena tidak ada di database
    unset($dataToSave['poster_image']); 
    
    // 5. Tambahkan key 'poster_url' dengan path yang benar
    $dataToSave['poster_url'] = $path; 

    // 6. Simpan data yang sudah bersih ke database
    Movie::create($dataToSave);

    return redirect()->route('admin.movies.index')->with('success', 'Movie created.');
}

    public function edit(Movie $movie) {
        $categories = MovieCategory::all();
        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
{
    // 1. Validasi (ini sudah benar)
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'release_date' => 'required|date',
        'movie_category_id' => 'required|integer|exists:movie_categories,id',
        'poster_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // --- PERBAIKAN DI SINI ---
    
    // 2. Siapkan data untuk di-update
    $dataToUpdate = $validated;

    // 3. Hapus key 'poster_image'
    unset($dataToUpdate['poster_image']);

    // 4. Cek jika ada file gambar baru yang di-upload
    if ($request->hasFile('poster_image')) {
        // Hapus gambar lama (jika ada dan bukan dari seeder)
        if ($movie->poster_url && !Str::startsWith($movie->poster_url, 'http')) {
            Storage::disk('public')->delete($movie->poster_url);
        }
        
        // Simpan gambar baru dan tambahkan path-nya ke data update
        $dataToUpdate['poster_url'] = $request->file('poster_image')->store('posters', 'public');
    }

    // 5. Update movie dengan data yang sudah bersih
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
