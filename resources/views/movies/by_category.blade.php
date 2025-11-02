@extends('layouts.app')

@section('title', 'Movies in ' . $category->name)

@section('content')
    {{-- Judul halaman yang dinamis sesuai nama kategori --}}
    <h1 class="mb-4">Category: <span class="text-primary">{{ $category->name }}</span></h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        {{-- Gunakan @forelse untuk menangani kasus jika tidak ada film --}}
        @forelse ($movies as $movie)
            
            {{-- 
              - PENGGUNAAN COMPONENT 
              - Ini adalah perbaikan utamanya.
              - Kita memanggil component 'movie-card' dan mengirimkan data '$movie'.
              - Component ini (components/movie-card.blade.php) sudah
              - memiliki logika yang benar untuk menampilkan gambar
              - menggunakan '$movie->poster_display_url'.
            --}}
            <x-movie-card :movie="$movie" />

        @empty
            {{-- Pesan ini akan muncul jika tidak ada film dalam kategori ini --}}
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No movies found in this category yet.
                </div>
            </div>
        @endforelse
    </div>

    {{-- 
      - Menampilkan link untuk Paginasi (halaman 1, 2, 3, dst.) 
      - Ini hanya akan berfungsi jika di MovieCategoryController Anda
      - menggunakan ->paginate(12) dan BUKAN ->get().
    --}}
    <div class="mt-4">
        {{ $movies->links() }}
    </div>

    {{-- Tombol untuk kembali ke halaman daftar semua kategori --}}
    <a href="{{ route('movies.categories') }}" class="btn btn-secondary mt-4">← Back to All Categories</a>
@endsection