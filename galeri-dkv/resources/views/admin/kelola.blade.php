@extends('layouts.admin')

@section('konten_admin')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold m-0">Kelola Daftar Karya</h3>
        <a href="/upload-karya" class="btn btn-primary fw-bold shadow-sm">➕ Tambah Karya Baru</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Karya</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($karyas as $index => $karya)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-medium text-primary">{{ $karya->judul_karya }}</td>
                                <td><span class="badge bg-secondary">{{ $karya->nama_kategori }}</span></td>
                                <td>{{ $karya->nama_siswa }}</td>
                                <td>{{ $karya->tahun_ajaran }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="/edit-karya/{{ $karya->id }}" class="btn btn-sm btn-warning fw-bold">Edit</a>

                                        <form action="/hapus-karya/{{ $karya->id }}" method="POST" onsubmit="return confirm('Yakin mau hapus karya ini permanen? File gambar/video-nya juga bakal hilang lho.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fw-bold">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada karya yang diunggah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection