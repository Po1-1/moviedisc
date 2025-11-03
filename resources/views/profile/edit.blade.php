@extends('layouts.app') @section('title', 'Profile')

@section('content')
    <h1 class="mb-4">Profile</h1>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Profile Information</h5>
                    <p class="mb-0 text-muted" style="font-size: 0.9em;">Update your account's profile information and email address.</p>
                </div>
                <div class="card-body">
                    {{-- Ini akan memuat form dari file partial --}}
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Update Password</h5>
                    <p class="mb-0 text-muted" style="font-size: 0.9em;">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                <div class="card-body">
                    {{-- Ini akan memuat form dari file partial --}}
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Delete Account</h5>
                </div>
                <div class="card-body">
                    {{-- Ini akan memuat form dari file partial --}}
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
@endsection