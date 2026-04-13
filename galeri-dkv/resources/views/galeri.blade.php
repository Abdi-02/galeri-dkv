@extends('layouts.main')

@section('konten')
    <div class="text-center mb-5 mt-4">
        <h2 class="fw-bold text-dark">Eksplorasi Karya DKV</h2>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form action="/galeri" method="GET" class="d-flex gap-2">
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <input type="text" name="search" class="form-control rounded-pill px-4 shadow-sm border-0" 
                           placeholder="Cari judul karya atau nama siswa..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-utama rounded-pill px-4">Cari</button>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-2 flex-wrap mt-4">
            <a href="/galeri" class="btn btn-filter px-4 {{ !request('kategori') ? 'active' : '' }}">Semua</a>
            @foreach($kategoris as $kategori)
                <a href="/galeri?kategori={{ $kategori->id }}&search={{ request('search') }}" 
                   class="btn btn-filter px-4 {{ request('kategori') == $kategori->id ? 'active' : '' }}">
                   {{ $kategori->nama_kategori }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="row g-4 mb-4">
        @forelse($karyas as $karya)
            <div class="col-md-4 col-sm-6">
                <a href="/karya/{{ $karya->id }}" class="galeri-item text-decoration-none">
                    
                    @php $ext = pathinfo($karya->file_karya, PATHINFO_EXTENSION); @endphp
                    @if(in_array(strtolower($ext), ['mp4', 'mov']))
                        <video muted loop onmouseover="this.play()" onmouseout="this.pause()">
                            <source src="{{ asset('storage/' . $karya->file_karya) }}" type="video/{{ $ext }}">
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $karya->file_karya) }}" alt="{{ $karya->judul_karya }}">
                    @endif

                    <div class="galeri-overlay">
                        <h5>{{ $karya->judul_karya }}</h5>
                        <p>{{ $karya->nama_siswa }} &bull; {{ $karya->tahun_ajaran }}</p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h5 class="text-muted">Karya tidak ditemukan.</h5>
                <p class="text-muted small">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
                <a href="/galeri" class="btn btn-utama mt-3 px-4 rounded-pill">Reset Pencarian</a>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $karyas->links('pagination::bootstrap-5') }}
    </div>
@endsection