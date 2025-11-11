@extends('layouts.app')

@section('title', 'Category: ' . $category->name)

@section('content')
    <x-back-button :href="route('movies.categories')" text="All Categories" />

    <h1 class="mb-4">Category: <span class="text-gold">{{ $category->name }}</span></h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($movies as $movie)
            <x-movie-card :movie="$movie" />
        @empty
            <div class="col-12">
                <p class="text-center text-muted mt-5">No movies found in this category.</p>
            </div>
        @endforelse
    </div>

    @if($movies->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $movies->withQueryString()->links() }}
        </div>
    @endif
@endsection
