<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - DKV SMKN 1 Nabire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; width: 260px; background-color: #212529; }
        .bg-oranye { background-color: #fd7e14; color: white; }
        .bg-oranye:hover { background-color: #e36a00; color: white; }
        .hover-white:hover { color: white !important; background-color: rgba(255,255,255,0.1); border-radius: 5px;}
    </style>
</head>
<body class="bg-light">

<div class="d-flex">
    <div class="sidebar p-3 text-white">
        <div class="text-center mb-4 mt-2">
            <h5 class="fw-bold text-primary">Admin<span class="text-danger">DKV</span></h5>
            <small class="text-muted">Halo, {{ auth()->user()->name }}</small>
        </div>
        
        <ul class="nav flex-column gap-2 mt-4">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white {{ request()->is('dashboard') ? 'bg-primary rounded shadow-sm' : 'hover-white text-white-50' }}">📊 Beranda</a>
            </li>
           <li class="nav-item">
                <a href="/kelola-karya" class="nav-link text-white {{ request()->is('kelola-karya') ? 'bg-primary rounded shadow-sm' : 'hover-white text-white-50' }}">📁 Kelola Karya</a>
            </li>
            <li class="nav-item">
                <a href="/upload-karya" class=" nav-link text-white-50 hover-white">➕ Upload Karya</a>
            </li>
           <li class="nav-item">
                <a href="/pengaturan" class="nav-link text-white {{ request()->is('pengaturan') ? 'bg-primary rounded shadow-sm' : 'hover-white text-white-50' }}">⚙️ Pengaturan Akun</a>
            </li>
            <li class="nav-item mt-3 border-top border-secondary pt-3">
                <a href="/" class="nav-link text-warning" target="_blank">🌐 Lihat Website Publik</a>
            </li>
        </ul>

        <div class="mt-5 pt-3 border-top border-secondary">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">Keluar Sistem</button>
            </form>
        </div>
    </div>

    <div class="flex-grow-1 p-5">
        @yield('konten_admin')
    </div>
</div>

</body>
</html>