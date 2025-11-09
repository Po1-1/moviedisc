@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    {{-- TAMBAHKAN TOMBOL BACK DI SINI --}}
    <x-back-button />

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Gunakan Grid Bootstrap untuk menata layout --}}
    <div class="row g-5">
        {{-- Kolom Kiri: Poster Film --}}
        <div class="col-md-4">
            {{-- INI ADALAH BARIS YANG DIPERBAIKI --}}
            <img src="{{ $movie->poster_display_url }}" class="img-fluid rounded shadow-lg" alt="Poster for {{ $movie->title }}">
        </div>

        {{-- Kolom Kanan: Detail Film --}}
        <div class="col-md-8">
            <h1 class="display-5 fw-bold">{{ $movie->title }}</h1>
            <p class="text-white fs-5">{{ $movie->movieCategory->name }} | {{ \Carbon\Carbon::parse($movie->release_date)->format('F j, Y') }}</p>

            {{-- Tampilkan rating rata-rata jika ada --}}
            @if ($movie->userReviews->count() > 0)
                @php
                    $averageRating = $movie->userReviews->avg('rating');
                    $reviewCount = $movie->userReviews->count();
                @endphp
                <div class="mb-3 d-flex align-items-center">
                    <span class="text-warning h4 mb-0">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($averageRating))
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </span>
                    <span class="ms-2 fs-5">{{ number_format($averageRating, 1) }} dari 5</span>
                    <span class="text-white ms-2">({{ $reviewCount }} ulasan)</span>
                </div>
            @endif

            <p class="lead">{{ $movie->description }}</p>
            <hr class="my-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-warning mb-0">Rp {{ number_format($movie->price, 0, ',', '.') }}</h3>
                <button type="button" class="btn btn-lg btn-primary">Confirm Purchase</button>
            </div>
        </div>
    </div>

    {{-- Bagian Ulasan Pengguna --}}
    <div class="mt-5 pt-4 border-top">
        <h2 class="mb-4 fw-bold">User Reviews</h2>

        {{-- Form untuk menambah ulasan (hanya untuk user yang login) --}}
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
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
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

        {{-- Pesan untuk user yang belum login --}}
        @guest
        <div class="alert alert-secondary text-center">
            You must be <a href="{{ route('login') }}">logged in</a> to add a review.
        </div>
        @endguest

        {{-- Daftar ulasan yang sudah ada --}}
        @forelse ($movie->userReviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">{{ $review->user->name }}</h5>
                        <span class="text-warning">
                            @for ($i = 0; $i < $review->rating; $i++) ★ @endfor
                            @for ($i = $review->rating; $i < 5; $i++) ☆ @endfor
                        </span>
                    </div>
                    <p class="card-text mt-2">{{ $review->comment }}</p>
                    <p class="card-text mb-0"><small class="text-white">Reviewed on {{ $review->created_at->format('F j, Y') }}</small></p>
                </div>
            </div>
        @empty
            <p class="text-center text-white">No reviews yet. Be the first to review this movie!</p>
        @endforelse
    </div>
@endsection