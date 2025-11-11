<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/template.css') }}">
        
        <style>
            body {
                background-color: var(--dark-bg, #121212) !important;
            }
        </style>
    </head>
    <body class="d-flex align-items-center justify-content-center min-vh-100">
        
        <div class="col-md-6 col-lg-4">
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <h1 class="fw-bold fs-1">🎬 Movie Disc</h1>
                </a>
            </div>

            <div class="card shadow-lg">
                <div class="card-body p-5">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>