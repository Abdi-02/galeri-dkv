<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Karya DKV SMKN 1 Nabire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Pengaturan Font & Background Dasar */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFA; /* Putih sedikit abu biar bersih */
            color: #333;
        }

        /* Warna Biru SMK Nabire */
        .bg-smk-blue { background-color: #155B9F !important; }
        .text-smk-blue { color: #155B9F !important; }
        
        /* Tombol Utama (Warna Biru SMK) */
        .btn-utama {
            background-color: #155B9F;
            color: white;
            border-radius: 8px;
            font-weight: 500;
            border: none;
            transition: all 0.2s;
        }
        .btn-utama:hover { background-color: #0f4375; color: white; }

        /* Tombol Filter (Pill) di halaman Galeri */
        .btn-filter {
            border: 1px solid #ddd;
            border-radius: 20px;
            color: #555;
            background: white;
            font-weight: 500;
        }
        .btn-filter.active, .btn-filter:hover {
            background-color: #155B9F;
            color: white;
            border-color: #155B9F;
        }

        /* Gaya Kartu Minimalis (Sesuai Mockup) */
        .card-bersih {
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            background: white;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02); /* Shadow sangat halus */
            transition: transform 0.2s ease;
        }
        .card-bersih:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.05);
        }

        /* Navbar Custom */
        .navbar-custom {
            padding: 15px 0;
        }
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.85);
            font-size: 0.95rem;
            margin: 0 10px;
        }
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active {
            color: white;
            font-weight: 600;
        }
        /* Efek Galeri Masonry/Grid Full Gambar */
        .galeri-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            aspect-ratio: 4/3; /* Bikin semua gambar proporsional sama besar */
            display: block; /* Supaya seluruh area bisa diklik */
        }
        .galeri-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        }
        .galeri-item img, .galeri-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .galeri-item:hover img, .galeri-item:hover video {
            transform: scale(1.05); /* Efek zoom tipis pas di-hover */
        }
        
        /* Overlay Gelap Transparan yang muncul saat di-hover */
        .galeri-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0; /* Awalnya ngumpet */
            transition: opacity 0.3s ease;
        }
        .galeri-item:hover .galeri-overlay {
            opacity: 1; /* Muncul pas di-hover */
        }
        .galeri-overlay h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }
        .galeri-overlay p {
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        /* Perbaikan Efek Galeri: Hapus Scale agar tetap utuh */
    .galeri-item img, .galeri-item video {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Tetap pakai cover agar grid rapi, tapi kita hapus transform scale-nya */
        transition: opacity 0.3s ease;
    }
    
    .galeri-item:hover img, .galeri-item:hover video {
        transform: none !important; /* Mematikan efek auto zoom */
    }

    /* Tambahan untuk Navbar Active */
    .navbar-custom .nav-link.active {
        color: #FFD700 !important; /* Kita kasih warna emas/kuning biar kontras dengan biru */
        border-bottom: 2px solid #FFD700;
    }

    </style>
</head>
<body>

   <nav class="navbar navbar-expand-lg bg-smk-blue navbar-custom sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="/">
        <div class="bg-white rounded-circle me-2" style="width: 35px; height: 35px;"></div>
        SMK NEGERI 1 NABIRE
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('galeri*') ? 'active' : '' }}" href="/galeri">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('tentang-kami') ? 'active' : '' }}" href="/tentang-kami">Tentang Kami</a>
        </li>
      </ul>
      <div class="d-flex">
          <a href="#" class="btn bg-white text-smk-blue fw-bold px-4 rounded-3 shadow-sm">Kontak</a>
      </div>
    </div>
  </div>
</nav>

    <div class="container mt-4 mb-5">
        @yield('konten')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="bg-white border-top py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="fw-bold text-smk-blue mb-3">SMK NEGERI 1 NABIRE</h5>
                    <p class="text-muted small w-75">
                        Portal Galeri Karya Digital Jurusan Desain Komunikasi Visual. 
                        Wadah kreativitas dan inovasi siswa untuk masa depan industri kreatif Indonesia.
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Tautan Cepat</h6>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><a href="/" class="text-decoration-none text-muted">Beranda</a></li>
                        <li class="mb-2"><a href="/galeri" class="text-decoration-none text-muted">Galeri Karya</a></li>
                        <li class="mb-2"><a href="/tentang-kami" class="text-decoration-none text-muted">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Kontak</h6>
                    <p class="text-muted small mb-1">📍 Jl. Ampera, Nabire</p>
                    <p class="text-muted small">📧 info@smkn1nabire.sch.id</p>
                </div>
            </div>
            <hr class="my-4 opacity-25">
            <div class="text-center">
                <p class="text-muted small mb-0">&copy; 2026 Muhammad Abdillah - TA D3 Teknik Komputer UNIPA</p>
            </div>
        </div>
    </footer>
</body>
</html>