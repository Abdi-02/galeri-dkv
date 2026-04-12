@extends('layouts.main')

@section('konten')
    <div class="text-center mb-5 mt-4">
        <h2 class="fw-bold display-6 text-primary">Eksplorasi Galeri Karya</h2>
        <p class="text-muted fs-5">Temukan inspirasi dari berbagai bidang keahlian siswa-siswi DKV</p>

        <div class="d-flex justify-content-center gap-2 flex-wrap mt-4">
            <a href="/galeri" class="btn {{ !request('kategori') ? 'btn-oranye' : 'btn-outline-secondary' }} rounded-pill px-4 fw-medium shadow-sm">
                Semua Karya
            </a>
            
            @foreach($kategoris as $kategori)
                <a href="/galeri?kategori={{ $kategori->id }}" class="btn {{ request('kategori') == $kategori->id ? 'btn-oranye' : 'btn-outline-secondary' }} rounded-pill px-4 fw-medium shadow-sm">
                    {{ $kategori->nama_kategori }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="row g-4 mb-5">
        @forelse($karyas as $karya)
            <div class="col-md-4">
                <div class="card card-karya border-0 shadow-sm h-100">
                    
                    @php 
                        $ext = pathinfo($karya->file_karya, PATHINFO_EXTENSION); 
                    @endphp
                    
                    @if(in_array(strtolower($ext), ['mp4', 'mov']))
                        <video class="card-img-top bg-dark" style="height: 250px; object-fit: cover;" controls controlsList="nodownload">
                            <source src="{{ asset('storage/' . $karya->file_karya) }}" type="video/{{ $ext }}">
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $karya->file_karya) }}" class="card-img-top" alt="{{ $karya->judul_karya }}" style="height: 250px; object-fit: cover;">
                    @endif

                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-2">{{ $karya->nama_kategori }}</span>
                        <h5 class="card-title fw-bold text-dark">{{ $karya->judul_karya }}</h5>
                        <p class="text-muted small mb-3">Oleh: {{ $karya->nama_siswa }} | {{ $karya->tahun_ajaran }}</p>
                        <a href="/karya/{{ $karya->id }}" class="btn btn-outline-primary w-100 rounded-pill fw-medium">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h5 class="text-muted">Karya belum tersedia di kategori ini.</h5>
                <a href="/galeri" class="btn btn-primary mt-3 rounded-pill px-4">Lihat Kategori Lain</a>
            </div>
        @endforelse
    </div>
@endsection