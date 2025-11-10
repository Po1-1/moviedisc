@extends('layouts.app')
@section('title', 'All Movies')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Our Movie Collection</h1>
    </div>

    {{-- PERBAIKAN: Tambahkan input group untuk form pencarian --}}
    <form action="{{ route('movies.index') }}" method="GET" class="mb-5">
        <div class="input-group input-group-lg">
            <input type="text" name="search" class="form-control" placeholder="Search for a movie by title..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($movies as $movie)
            <x-movie-card :movie="$movie" />
        @empty
            <div class="col-12">
                <div class="text-center p-5 rounded-3" style="background-color: var(--component-bg);">
                    <h3 class="text-muted">No movies found.</h3>
                    @if(request('search'))
                        <p class="lead text-muted">We couldn't find any movies matching your search for "{{ request('search') }}".</p>
                        <a href="{{ route('movies.index') }}" class="btn btn-outline-light mt-3">Clear Search</a>
                    @endif
                </div>
            </div>
        @endforelse
    </div>

    @if($movies->hasPages())
        <div class="mt-5 d-flex justify-content-center align-items-center">
            {{-- Link Paginasi --}}
            {{-- withQueryString() penting agar pencarian tidak hilang saat pindah halaman --}}
            {{ $movies->withQueryString()->links() }}
        </div>
    @endif
@endsection