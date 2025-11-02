@extends('layouts.app')
@section('title', 'Admin - Manage Movies')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Manage Movies</h1>
        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">Add New Movie</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead> <tr> <th>Poster</th> <th>Title</th> <th>Category</th> <th>Actions</th> </tr> </thead>
        <tbody>
            @forelse($movies as $movie)
                <tr>
                    <td><img src="{{ $movie->poster_display_url }}" alt="" width="60" style="height: 90px; object-fit: cover;"></td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->movieCategory->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr> <td colspan="4" class="text-center">No movies found.</td> </tr>
            @endforelse
        </tbody>
    </table>
    {{ $movies->links() }}
@endsection