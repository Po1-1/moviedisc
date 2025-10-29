<x-guest-layout>
    <h3 class="text-center fw-bold mb-3">Forgot Password</h3>

    <p class="text-center text-muted mb-4" style="font-size: 0.95em;">
        No problem. Just let us know your email address and we will email you a password reset link.
    </p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Email Password Reset Link
            </button>
        </div>
    </form>
</x-guest-layout>