<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Movie Disc')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🎬 Movie Disc</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Movies</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                        {{-- Tampilan untuk user yang sudah login --}}
                        @if (Auth::user()->is_admin)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-warning fw-bold" href="#" id="adminDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin Panel
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.movies.index') }}">Manage Movies</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Manage Users</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="nav-item">
                            {{-- Tambahkan juga kondisi 'active' untuk halaman profil --}}
                            <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}"
                                href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @hasSection('full_width_content')
        <main>
            @yield('full_width_content')
        </main>
    @else
        <main class="container mt-5">
            @yield('content')
        </main>
    @endif

    <footer class="text-center py-4 mt-5">
        <p class="mb-0">Movie Disc &copy; {{ date('Y') }}</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
