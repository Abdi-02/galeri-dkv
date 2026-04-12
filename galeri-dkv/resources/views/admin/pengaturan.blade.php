@extends('layouts.admin')

@section('konten_admin')
    <h3 class="fw-bold mb-4">Pengaturan Akun Admin</h3>

    @if(session('sukses'))
        <div class="alert alert-success fw-bold shadow-sm">{{ session('sukses') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="/pengaturan" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h5 class="fw-bold border-bottom pb-2 mb-4 text-primary">Informasi Dasar</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium">Nama Tampilan</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium">Alamat Email Login</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <h5 class="fw-bold border-bottom pb-2 mb-4 text-danger mt-5">Keamanan Akun</h5>
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium">Password Baru</label>
                            <input type="password" name="password" class="form-control bg-light" placeholder="Masukkan password baru...">
                            <small class="text-muted fw-bold">*Kosongkan jika Anda tidak ingin mengubah password saat ini.</small>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold w-100 mt-2">💾 Simpan Pengaturan</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card border-0 shadow-sm rounded-4 bg-dark text-white">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary rounded-circle d-inline-flex justify-content-center align-items-center mb-3 shadow" style="width: 80px; height: 80px;">
                        <span class="fs-1">👤</span>
                    </div>
                    <h5 class="fw-bold">{{ auth()->user()->name }}</h5>
                    <p class="text-white-50 small">Administrator Utama</p>
                    <hr class="border-secondary">
                    <small class="text-white-50">Sistem Galeri Karya DKV <br> SMKN 1 Nabire</small>
                </div>
            </div>
        </div>
    </div>
@endsection