@extends('layouts.app')
@section('title', 'Tentang Kami - Movie Disc')

@section('content')
    <div class="about-header text-center mb-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Kisah di Balik Layar</h1>
            <p class="fs-4 col-md-10 mx-auto text-muted">Movie Disc bukan sekadar database film. Kami adalah komunitas, platform, dan surat cinta untuk dunia sinema.</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center">
                <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963e?q=80&w=1920&auto=format&fit=crop" class="img-fluid rounded-3 shadow-lg" alt="Visi Movie Disc">
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold">Misi Kami</h2>
                        <p>Menjadi jembatan antara Anda dan cerita-cerita luar biasa dari seluruh dunia, menyediakan platform yang elegan, cepat, dan informatif bagi para pecinta film.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold">Filosofi Kami</h2>
                        <p>Kami percaya setiap film memiliki kekuatan untuk menginspirasi. Kami berkomitmen menyajikan informasi dengan akurat dan antusiasme yang sama seperti yang Anda rasakan saat lampu bioskop meredup.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container px-4 py-5 text-center">
        <h2 class="display-5 pb-2 border-bottom">Tim di Balik Movie Disc</h2>
        <p class="lead text-muted my-4">Kami adalah sekelompok individu yang bersemangat tentang teknologi dan film.</p>
        <div class="row g-4 justify-content-center">
            {{-- Member 1 --}}
            <div class="col-lg-3 col-md-6">
                <img class="rounded-circle team-img mb-3" src="https://images.unsplash.com/photo-1557862921-37829c790f19?q=80&w=1771&auto=format&fit=crop" alt="Anggota Tim 1" />
                <h4 class="fw-normal">John Doe</h4>
                <p class="text-muted">Project Lead & Backend Developer</p>
            </div>
            {{-- Member 2 --}}
            <div class="col-lg-3 col-md-6">
                <img class="rounded-circle team-img mb-3" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1770&auto=format&fit=crop" alt="Anggota Tim 2" />
                <h4 class="fw-normal">Jane Doe</h4>
                <p class="text-muted">UI/UX Designer</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card p-5 text-center">
            <div class="card-body">
                <h2 class="fw-bold">Tertarik dengan Proyek Kami?</h2>
                <p class="lead text-muted mb-4">Lihat bagaimana kami membangun semuanya dari awal. Jelajahi koleksi film yang menjadi inti dari aplikasi ini.</p>
                <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg">Jelajahi Koleksi Film</a>
            </div>
        </div>
    </div>
@endsection
