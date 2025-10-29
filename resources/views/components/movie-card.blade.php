<div class="col">
    <div class="card h-100">
        <img src="{{ $movie->poster_display_url }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
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