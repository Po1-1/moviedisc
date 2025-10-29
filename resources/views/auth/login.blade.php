<x-guest-layout>
    <h3 class="text-center fw-bold mb-4">Login to Your Account</h3>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            @error('email')
                <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Remember me</label>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            @if (Route::has('password.request'))
                <a class="text-decoration-none" href="{{ route('password.request') }}" style="font-size: 0.9em;">
                    Forgot your password?
                </a>
            @endif

            <button type="submit" class="btn btn-primary ms-3">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>