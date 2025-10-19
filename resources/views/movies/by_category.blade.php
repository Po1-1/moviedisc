@extends('layouts.app')

@section('title', 'Movies in ' . $category->name)

@section('content')
    {{-- judul sesuaiin kategori yang dipilih --}}
    <h1 class="mb-4">Category: <span class="text-primary">{{ $category->name }}</span></h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($movies as $movie)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($movie->description, 50) }}</p>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary w-100">
                            View Details & Buy
                        </a>
                    </div>
                </div>
            </div>
        @empty
            {{-- kalo gaada film di kategori ini --}}
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No movies found in this category yet.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Tombol back --}}
    <a href="{{ route('movies.categories') }}" class="btn btn-secondary mt-4">← Back to All Categories</a>
@endsection