@csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="movie_category_id" class="form-label">Category</label>
    <select class="form-select" id="movie_category_id" name="movie_category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('movie_category_id', $movie->movie_category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $movie->description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">Price (Rp)</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $movie->price ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="release_date" class="form-label">Release Date</label>
        <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date ?? '') }}" required>
    </div>
</div>
<div class="mb-3">
    <label for="poster_image" class="form-label">Poster Image</label>
    <input class="form-control" type="file" id="poster_image" name="poster_image" {{ $movie->poster_url ?? 'required' }}>
    @if (isset($movie) && $movie->poster_url)
        <img src="{{ $movie->poster_display_url }}" alt="Current Poster" class="img-thumbnail mt-2" width="150">
    @endif
</div>
<button type="submit" class="btn btn-primary">{{ $movie->id ?? null ? 'Update' : 'Save' }} Movie</button>