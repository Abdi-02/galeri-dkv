@extends('layouts.admin')

@section('konten_admin')
    <h3 class="fw-bold mb-4">Upload Karya Baru</h3>

    @if(session('sukses'))
        <div class="alert alert-success fw-bold">{{ session('sukses') }}</div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="/upload-karya" method="POST" enctype="multipart/form-data">
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
                    <small class="text-muted">Maksimal ukuran file: 20MB.</small>
                </div>

                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">💾 Simpan & Publikasikan</button>
            </form>
        </div>
    </div>
@endsection