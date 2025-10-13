@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <div class="row">
        {{-- KOLOM KIRI: POSTER --}}
        <div class="col-md-4">
            <img src="{{ $movie->poster_url }}" class="img-fluid rounded" alt="{{ $movie->title }}">
        </div>

        {{-- KOLOM KANAN: DETAIL & PEMBELIAN --}}
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p class="text-muted">Release Date: {{ \Carbon\Carbon::parse($movie->release_date)->format('d F Y') }}</p>

            {{-- Tampilkan rata-rata rating jika ada review --}}
            @if ($reviewCount > 0)
                <div class="mb-3">
                    <span class="h4 text-warning">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($averageRating))
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </span>
                    <span class="ms-2 h5">{{ number_format($averageRating, 1) }} out of 5</span>
                    <span class="text-muted">({{ $reviewCount }} reviews)</span>
                </div>
            @endif

            <p>{{ $movie->description }}</p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-success mb-0">Price: ${{ number_format($movie->price, 2) }}</h3>
                <button type="button" class="btn btn-lg btn-success">Confirm Purchase</button>
            </div>
        </div>
    </div>

    {{-- BAGIAN BARU: DAFTAR REVIEW --}}
    <div class="row mt-5">
        <div class="col-12">
            <hr>
            <h2 class="mb-3">User Reviews</h2>

            @forelse ($movie->userReviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->user_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </h6>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><small class="text-muted">Reviewed {{ $review->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    There are no reviews for this movie yet.
                </div>
            @endforelse
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">← Back</a>
@endsection