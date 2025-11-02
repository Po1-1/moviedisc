@extends('layouts.app')
@section('title', 'All Movies')
@section('content')
    <h1 class="mb-4">Our Movie Collection</h1>

    <form action="{{ route('movies.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for movies..." name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($movies as $movie)
            <x-movie-card :movie="$movie" /> 
        @empty
            <p class="text-center">No movies found.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $movies->links() }}
    </div>
@endsection