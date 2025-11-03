@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h2 class="fw-bold mb-4">Profile Settings</h2>

    <div class="row g-4">
        {{-- Kolom untuk Update Informasi Profil --}}
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Kolom untuk Update Password --}}
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- Kolom untuk Hapus Akun --}}
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body p-4 p-md-5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
