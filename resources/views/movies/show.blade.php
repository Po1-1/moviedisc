<h2 class="mb-3">User Reviews</h2>

@auth
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Add Your Review</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="{{ route('reviews.store', $movie->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">Select a rating</option>
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" id="comment" rows="3" class="form-control" required>{{ old('comment') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
</div>
@endauth

@guest
<div class="alert alert-info">
    You must be <a href="{{ route('login') }}">logged in</a> to add a review.
</div>
@endguest

@forelse ($movie->userReviews as $review)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $review->user->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                @for ($i = 0; $i < $review->rating; $i++)
                    ★
                @endfor
                @for ($i = $review->rating; $i < 5; $i++)
                    ☆
                @endfor
            </h6>
            <p class="card-text">{{ $review->comment }}</p>
            <p class="card-text"><small class="text-muted">Reviewed on {{ $review->created_at->format('F j, Y') }}</small></p>
        </div>
    </div>
@empty
    <p>No reviews yet. Be the first to review this movie!</p>
@endforelse