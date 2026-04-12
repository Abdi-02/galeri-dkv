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
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-smk-blue navbar-custom sticky-top">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="/">
            <div class="bg-white rounded-circle me-2" style="width: 35px; height: 35px;"></div>
            SMK NEGERI 1 NABIRE
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/galeri">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang Kami</a>
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
</body>
</html>