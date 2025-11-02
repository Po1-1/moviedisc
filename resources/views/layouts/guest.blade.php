<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            body {
                background-color: #f8f9fa;
            }
            .auth-card {
                max-width: 460px;
                width: 100%;
            }
        </style>
    </head>
    <body class="d-flex align-items-center justify-content-center min-vh-100">
        
        <div class="auth-card p-4">
            <div class="text-center mb-4">
                <a href="/" class="navbar-brand fs-3 fw-bold">
                    🎬 Movie Disc
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>