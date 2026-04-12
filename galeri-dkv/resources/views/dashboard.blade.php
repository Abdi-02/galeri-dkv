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
                <a href="/dashboard" class="nav-link bg-primary text-white rounded shadow-sm">📊 Beranda</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover-white">📁 Kelola Karya</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover-white">➕ Upload Karya</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover-white">⚙️ Pengaturan Akun</a>
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
        <h3 class="fw-bold mb-4">Upload Karya Baru</h3>
        
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Judul Karya</label>
                            <input type="text" name="judul_karya" class="form-control" required placeholder="Contoh: Poster Hari Pendidikan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Kategori</label>
                            <select name="kategori_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Siswa Pembuat Karya</label>
                        <input type="text" name="nama_siswa" class="form-control" required placeholder="Masukkan nama lengkap siswa">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control" required placeholder="Contoh: 2025/2026">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi Karya</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required placeholder="Jelaskan filosofi atau detail karya ini..."></textarea>
                    </div>

                   <div class="mb-4">
                        <label class="form-label fw-medium">File Karya (.JPG, .PNG, .MP4)</label>
                        <input type="file" name="file_karya" class="form-control form-control-lg bg-light" accept="image/*,video/mp4,video/quicktime" required>
                    </div>

                    <button type="submit" class="btn bg-oranye px-4 py-2 fw-bold">💾 Simpan & Publikasikan</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>