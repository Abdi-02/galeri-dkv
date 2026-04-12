@extends('layouts.main')

@section('konten')
    <div class="container mt-2 mb-5">
        <a href="/galeri" class="text-decoration-none text-secondary mb-4 d-inline-block fw-medium">
            &larr; Kembali ke Eksplorasi
        </a>

        <div class="row bg-white shadow-sm rounded-4 overflow-hidden border border-light">
            
            <div class="col-lg-7 p-0 bg-dark d-flex align-items-center justify-content-center" style="min-height: 500px;">
                @php 
                    $ext = pathinfo($karya->file_karya, PATHINFO_EXTENSION); 
                @endphp
                
                @if(in_array(strtolower($ext), ['mp4', 'mov']))
                    <video class="w-100 h-100" style="max-height: 800px; object-fit: contain;" controls controlsList="nodownload" autoplay muted>
                        <source src="{{ asset('storage/' . $karya->file_karya) }}" type="video/{{ $ext }}">
                        Browser Anda tidak mendukung pemutar video.
                    </video>
                @else
                    <img src="{{ asset('storage/' . $karya->file_karya) }}" class="img-fluid w-100 h-100" alt="{{ $karya->judul_karya }}" style="max-height: 800px; object-fit: contain;">
                @endif
            </div>

            <div class="col-lg-5 p-5">
                <span class="badge bg-primary mb-3 fs-6 px-3 py-2 rounded-pill">{{ $karya->nama_kategori }}</span>
                <h2 class="fw-bold text-dark mb-4">{{ $karya->judul_karya }}</h2>

                <div class="d-flex align-items-center mb-4 pb-4 border-bottom">
                    <div class="bg-light rounded-circle d-flex justify-content-center align-items-center me-3 border" style="width: 55px; height: 55px;">
                        <span class="fs-4">🎓</span>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">{{ $karya->nama_siswa }}</h6>
                        <small class="text-muted">Tahun Ajaran: {{ $karya->tahun_ajaran }}</small>
                    </div>
                </div>

                <h6 class="fw-bold text-dark mb-3">Deskripsi & Filosofi Karya</h6>
                <p class="text-muted" style="line-height: 1.8; text-align: justify;">
                    {{ $karya->deskripsi }}
                </p>

                <div class="mt-5 pt-3">
                    <p class="text-muted small mb-0">
                        Dipublikasikan pada: {{ \Carbon\Carbon::parse($karya->created_at)->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
            
        </div>
    </div>
@endsection