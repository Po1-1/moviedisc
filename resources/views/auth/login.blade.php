@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h2 class="card-title text-center fw-bold mb-4">Welcome Back</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <div class="d-flex justify-content-between">
                <label for="password" class="form-label">Password</label>
                @if (Route::has('password.request'))
                    <a class="small link-blue" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>
            <input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mb-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Remember me</label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">
                Log in
            </button>
        </div>
        <div class="text-center mt-4">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
@endsection
