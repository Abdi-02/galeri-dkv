@extends('layouts.main')

@section('konten')
    <div class="p-5 mb-5 hero-gradient shadow border-0 position-relative">
        <div class="container-fluid py-5 position-relative z-1">
            <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fs-6">🔥 Pameran Seni Batik Digital</span>
            <h1 class="display-4 fw-bold">Eksplorasi Karya Tanpa Batas!</h1>
            <p class="col-md-8 fs-5 mt-3 text-light opacity-75">
                Wadah publikasi digital eksklusif untuk karya-karya kreatif siswa Jurusan Desain Komunikasi Visual SMKN 1 Nabire. Jelajahi portofolio desain grafis, ilustrasi, dan videografi terbaik kami.
            </p>
            <button class="btn btn-light btn-lg text-primary fw-bold px-4 mt-3 rounded-pill shadow" type="button">
                Lihat Semua Karya
            </button>
        </div>
    </div>

    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-4">
            <div>
                <h3 class="fw-bold mb-0 text-dark">Karya Pilihan Terkini</h3>
                <p class="text-muted mb-0 mt-1">Inspirasi terbaru dari talenta DKV</p>
            </div>
            <a href="#" class="text-decoration-none text-danger fw-medium">Lihat Semua &rarr;</a>
        </div>

        <div class="d-flex justify-content-between align-items-end mb-4">
        <h4 class="fw-bold text-dark mb-0">Sorotan Karya</h4>
        <a href="/galeri" class="text-decoration-none text-smk-blue fw-medium">Lihat Semua &rarr;</a>
    </div>

    <div class="row g-4 mb-5">
        @forelse($karyas as $karya)
            <div class="col-md-4">
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
                        <p>{{ $karya->nama_siswa }} &bull; {{ $karya->nama_kategori }}</p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Karya belum tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="py-5 mt-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold">Apa Yang Kami Pelajari?</h4>
            <p class="text-muted">Kompetensi inti yang dikembangkan di Jurusan DKV SMKN 1 Nabire</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 border-0 shadow-sm rounded-4 bg-white h-100">
                    <span class="fs-1">🎨</span>
                    <h6 class="fw-bold mt-3">Desain Grafis</h6>
                    <p class="small text-muted mb-0">Identitas visual, poster, dan media cetak digital.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border-0 shadow-sm rounded-4 bg-white h-100">
                    <span class="fs-1">🎬</span>
                    <h6 class="fw-bold mt-3">Videografi</h6>
                    <p class="small text-muted mb-0">Produksi video pendek, editing, dan efek visual.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border-0 shadow-sm rounded-4 bg-white h-100">
                    <span class="fs-1">📸</span>
                    <h6 class="fw-bold mt-3">Fotografi</h6>
                    <p class="small text-muted mb-0">Teknik kamera profesional dan pengolahan foto digital.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border-0 shadow-sm rounded-4 bg-white h-100">
                    <span class="fs-1">🌐</span>
                    <h6 class="fw-bold mt-3">Interaktif</h6>
                    <p class="small text-muted mb-0">Perancangan antarmuka web dan media interaktif.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-smk-blue rounded-4 p-5 text-white my-5 shadow">
        <div class="row text-center">
            <div class="col-md-4">
                <h2 class="fw-bold mb-0">200+</h2>
                <p class="opacity-75">Siswa Aktif</p>
            </div>
            <div class="col-md-4 border-start border-end border-white border-opacity-25">
                <h2 class="fw-bold mb-0">500+</h2>
                <p class="opacity-75">Karya Terarsip</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold mb-0">4+</h2>
                <p class="opacity-75">Bidang Konsentrasi</p>
            </div>
        </div>
    </div>
@endsection