@extends('layouts.admin')

@section('konten_admin')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold m-0">Edit Karya</h3>
        <a href="/kelola-karya" class="btn btn-outline-secondary fw-bold shadow-sm">&larr; Kembali</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="/edit-karya/{{ $karya->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Judul Karya</label>
                        <input type="text" name="judul_karya" class="form-control" value="{{ $karya->judul_karya }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $karya->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Nama Siswa Pembuat Karya</label>
                    <input type="text" name="nama_siswa" class="form-control" value="{{ $karya->nama_siswa }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" value="{{ $karya->tahun_ajaran }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Deskripsi Karya</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ $karya->deskripsi }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">File Karya (.JPG, .PNG, .MP4)</label>
                    <input type="file" name="file_karya" class="form-control form-control-lg bg-light" accept="image/*,video/mp4,video/quicktime">
                    <small class="text-danger fw-bold">*Kosongkan jika tidak ingin mengganti gambar/video yang sudah ada.</small>
                </div>

                <button type="submit" class="btn btn-warning px-4 py-2 fw-bold text-dark">🔄 Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection