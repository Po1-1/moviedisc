@extends('layouts.app') @section('title', 'Dashboard') @section('content') <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    {{-- Ini adalah pesan "You're logged in!" versi Bootstrap --}}
                    <div class="alert alert-success mb-0">
                        {{ __("You're logged in!") }}
                    </div>

                    <p class="mt-4">
                        Welcome to Movie Disc, <strong>{{ Auth::user()->name }}</strong>!
                    </p>
                    <p class="text-muted">
                        From here you can manage your profile or start browsing movies to add your review.
                    </p>
                    <a href="{{ route('movies.index') }}" class="btn btn-primary">Browse Movies</a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Your Profile</a>
                </div>
            </div>
        </div>

        {{-- Panel ini hanya akan muncul jika user yang login adalah Admin --}}
        @if(Auth::user()->is_admin)
            <div class="col-lg-4">
                <div class="card bg-warning text-dark border-0 shadow-sm">
                    <div class="card-header fw-bold">Admin Access</div>
                    <div class="card-body">
                        <h5 class="card-title">Welcome, Admin!</h5>
                        <p class="card-text">You have administrative privileges and can manage the movie catalog.</p>
                        <a href="{{ route('admin.movies.index') }}" class="btn btn-dark">Go to Admin Panel</a>
                    </div>
                </div>
            </div>
        @endif
    </div>