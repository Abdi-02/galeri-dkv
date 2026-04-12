@extends('layouts.admin')

@section('konten_admin')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold m-0">Beranda Statistik</h3>
        <span class="badge bg-white text-dark border p-2 shadow-sm">Tahun Ajaran Aktif: 2025/2026</span>
    </div>
    
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-primary text-white h-100 position-relative overflow-hidden">
                <div class="card-body p-4 position-relative z-1">
                    <h5 class="fw-normal opacity-75 mb-1">Total Karya</h5>
                    <h1 class="display-4 fw-bold mb-0">{{ $totalKarya }}</h1>
                    <p class="mb-0 mt-2 text-white-50">Desain & Video terpublikasi</p>
                </div>
                <div class="position-absolute opacity-25" style="top: -20px; right: -20px; width: 100px; height: 100px; border-radius: 50%; background: white;"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-warning text-dark h-100 position-relative overflow-hidden">
                <div class="card-body p-4 position-relative z-1">
                    <h5 class="fw-normal opacity-75 mb-1">Total Kategori</h5>
                    <h1 class="display-4 fw-bold mb-0">{{ $totalKategori }}</h1>
                    <p class="mb-0 mt-2 text-dark-50">Jenis bidang seni</p>
                </div>
                <div class="position-absolute opacity-25" style="top: -20px; right: -20px; width: 100px; height: 100px; border-radius: 50%; background: white;"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-danger text-white h-100 position-relative overflow-hidden">
                <div class="card-body p-4 position-relative z-1">
                    <h5 class="fw-normal opacity-75 mb-1">Total Admin</h5>
                    <h1 class="display-4 fw-bold mb-0">{{ $totalAdmin }}</h1>
                    <p class="mb-0 mt-2 text-white-50">Akun pengelola aktif</p>
                </div>
                <div class="position-absolute opacity-25" style="top: -20px; right: -20px; width: 100px; height: 100px; border-radius: 50%; background: white;"></div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h5 class="fw-bold border-bottom pb-2">👋 Selamat Datang di Panel Kontrol</h5>
            <p class="text-muted mt-3">Gunakan menu di sebelah kiri untuk mengelola konten website galeri DKV SMKN 1 Nabire. Pastikan Anda mengunggah karya dengan resolusi yang optimal dan format yang diizinkan (JPG, PNG, atau MP4).</p>
        </div>
    </div>
@endsection