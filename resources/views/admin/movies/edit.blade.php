@extends('layouts.app')
@section('title', 'Admin - Edit Movie')
@section('content')
    <h1>Edit Movie: {{ $movie->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </div>
    @endif
    <form action="{{ route('admin.movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.movies._form')
    </form>
@endsection