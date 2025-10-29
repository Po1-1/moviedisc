@extends('layouts.app')
@section('title', 'Admin - Add New Movie')
@section('content')
    <h1>Add New Movie</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </div>
    @endif
    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.movies._form', ['movie' => new \App\Models\Movie()])
    </form>
@endsection