<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Movie Disc')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- Link ke file tema utama kita --}}
<link rel="stylesheet" href="{{ asset('css/template.css') }}">
{{-- Hapus @yield('styles') karena style sudah terpusat --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🎬 Movie Disc</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Movies</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Gunakan class footer yang baru --}}
    <footer class="text-center py-4 mt-4 footer-dark">
        <p>Movie Disc &copy; {{ date('Y') }}</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
