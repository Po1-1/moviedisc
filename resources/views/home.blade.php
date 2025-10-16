@extends('layouts.app')

@section('title', 'Selamat Datang di Movie Disc')

@section('content')
    {{-- Konten hero section tetap sama, tapi sekarang akan mengikuti tema global --}}
    <div class="text-center p-5 mb-4 rounded-3 hero-section">
        <h1 class="display-3 fw-bold">Welcome to Movie Disc!</h1>
        <p class="lead col-lg-8 mx-auto">Jelajahi katalog film yang tak terhingga, dari mahakarya klasik hingga rilisan
            terbaru. Movie Disc adalah rumah bagi para pencinta film.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
            {{-- Arahkan tombol ke halaman daftar film (movies.index) --}}
            <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg px-4 gap-3">Lihat Koleksi</a>
            <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg px-4">Tentang Kami</a>
        </div>
    </div>

    {{-- Konten lainnya akan otomatis mengikuti tema --}}
    <div class="container px-4 py-5" id="features">
        <h2 class="pb-2 border-bottom text-center display-5 mb-5">Mengapa Movie Disc?</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col text-center">
                <div class="feature-icon bg-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-collection-play" viewBox="0 0 16 16">
                        <path
                            d="M2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1zm2.765 5.576A.5.5 0 0 0 6 7v5a.5.5 0 0 0 .765.424l4-2.5a.5.5 0 0 0 0-.848l-4-2.5z" />
                        <path
                            d="M1.5 14.5A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zm13-1a.5.5 0 0 0 .5-.5V6a.5.5 0 0 0-.5-.5h-13A.5.5 0 0 0 1 6v7a.5.5 0 0 0 .5.5h13z" />
                    </svg>
                </div>
                <h3>Katalog Lengkap</h3>
                <p>Dari film indie hingga blockbuster Hollywood, temukan semua yang Anda cari dalam database kami yang terus
                    diperbarui.</p>
            </div>
            <div class="col text-center">
                <div class="feature-icon bg-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <h3>Informasi Detail</h3>
                <p>Dapatkan akses instan ke sinopsis, sutradara, tanggal rilis, dan ulasan untuk setiap film yang ada.</p>
            </div>
            <div class="col text-center">
                <div class="feature-icon bg-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                </div>
                <h3>Untuk Para Penggemar</h3>
                <p>Dibuat oleh dan untuk para penggemar film. Kami memahami hasrat Anda dan menyajikannya dalam platform
                    yang elegan.</p>
            </div>
        </div>
    </div>

    <div class="bg-body-warning border-top">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=1920&auto=format&fit=crop"
                        class="d-block mx-lg-auto img-fluid showcase-img" alt="Movie Showcase" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold lh-1 mb-3">Dari Layar Lebar ke Layar Anda</h2>
                    <p class="lead">Kami percaya setiap film memiliki cerita untuk disampaikan. Misi kami adalah
                        menghubungkan Anda dengan cerita-cerita tersebut, memberikan pengalaman sinematik yang tak
                        terlupakan langsung dari kenyamanan rumah Anda.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
