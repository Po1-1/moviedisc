@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <div class="mb-4 text-sm">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
                Email Password Reset Link
            </button>
        </div>
    </form>
@endsection