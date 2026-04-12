@extends('layouts.main')

@section('konten')
    <div class="p-5 mb-5 hero-gradient shadow border-0 position-relative">
        <div class="container-fluid py-5 position-relative z-1">
            <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fs-6">🔥 Pameran Seni Batik Digital</span>
            <h1 class="display-4 fw-bold">Eksplorasi Karya Tanpa Batas!</h1>
            <p class="col-md-8 fs-5 mt-3 text-light opacity-75">
                Wadah publikasi digital eksklusif untuk karya-karya kreatif siswa Jurusan Desain Komunikasi Visual SMKN 1 Nabire. Jelajahi portofolio desain grafis, ilustrasi, dan videografi terbaik kami.
            </p>
            <button class="btn btn-light btn-lg text-primary fw-bold px-4 mt-3 rounded-pill shadow" type="button">
                Lihat Semua Karya
            </button>
        </div>
    </div>

    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-4">
            <div>
                <h3 class="fw-bold mb-0 text-dark">Karya Pilihan Terkini</h3>
                <p class="text-muted mb-0 mt-1">Inspirasi terbaru dari talenta DKV</p>
            </div>
            <a href="#" class="text-decoration-none text-danger fw-medium">Lihat Semua &rarr;</a>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-karya border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1626785773579-c13f6cb55705?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Thumbnail Karya" style="height: 250px; object-fit: cover;">
                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-2">Desain Grafis</span>
                        <h5 class="card-title fw-bold text-dark">Poster Kebudayaan Papua</h5>
                        <p class="text-muted small mb-3">Oleh: Budi Santoso</p>
                        <a href="#" class="btn btn-outline-primary w-100 rounded-pill">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-karya border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Thumbnail Karya" style="height: 250px; object-fit: cover;">
                    <div class="card-body p-4">
                        <span class="badge bg-danger mb-2">Ilustrasi</span>
                        <h5 class="card-title fw-bold text-dark">Maskot Burung Cenderawasih</h5>
                        <p class="text-muted small mb-3">Oleh: Siti Aminah</p>
                        <a href="#" class="btn btn-outline-primary w-100 rounded-pill">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-karya border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Thumbnail Karya" style="height: 250px; object-fit: cover;">
                    <div class="card-body p-4">
                        <span class="badge bg-warning text-dark mb-2">Fotografi</span>
                        <h5 class="card-title fw-bold text-dark">Senja di Pantai Nabire</h5>
                        <p class="text-muted small mb-3">Oleh: Andi Wijaya</p>
                        <a href="#" class="btn btn-outline-primary w-100 rounded-pill">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection