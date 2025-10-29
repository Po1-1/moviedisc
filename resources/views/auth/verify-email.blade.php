<x-guest-layout>
    <div class="p-3">
        <h3 class="fw-bold mb-3">Check Your Email</h3>

        <p class="text-muted" style="font-size: 0.95em;">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mt-4">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="mt-4 d-flex align-items-center justify-content-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-muted text-decoration-none">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>