<x-guest-layout>
    <h3 class="text-center fw-bold mb-4">Create an Account</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="d-flex align-items-center justify-content-end mt-4">
            <a class="text-decoration-none" href="{{ route('login') }}" style="font-size: 0.9em;">
                Already registered?
            </a>

            <button type="submit" class="btn btn-primary ms-3">
                Register
            </button>
        </div>
    </form>
</x-guest-layout>