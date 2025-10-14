@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
    <h1 class="mb-4">Our Movie Collection</h1>
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
            <p class="text-center">No movies found.</p>
        @endforelse
    </div>

@endsection