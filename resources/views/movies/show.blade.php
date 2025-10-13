@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $movie->poster_url }}" class="img-fluid rounded" alt="{{ $movie->title }}">
        </div>
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p class="text-muted">Release Date: {{ \Carbon\Carbon::parse($movie->release_date)->format('d F Y') }}</p>
            <p>{{ $movie->description }}</p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-success">Price: ${{ number_format($movie->price, 2) }}</h3>
                <button type="button" class="btn btn-lg btn-success">Confirm Purchase</button>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">← Back</a>
@endsection