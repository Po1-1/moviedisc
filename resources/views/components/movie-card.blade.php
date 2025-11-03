@props(['movie'])

<div class="col">
    <div class="card h-100 shadow-sm">
        <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $movie->title }}</h5>
            <p class="card-text text-muted small">{{ $movie->movieCategory->name }}</p>
            <div class="mt-auto pt-3">
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary w-100">
                    View Details
                </a>
            </div>
        </div>
    </div>
</div>