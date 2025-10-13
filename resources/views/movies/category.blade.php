@extends('layouts.app')
@section('title', 'All Categories')
@section('content')
    <h1 class="mb-4">Movie Categories</h1>
    <div class="list-group">
        @foreach($categories as $category)
            <a href="{{ route('movies.by_category', $category) }}" class="list-group-item list-group-item-action">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
@endsection