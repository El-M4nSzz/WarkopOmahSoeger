@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

<section class="position-relative d-flex align-items-center" style="height: 100vh; min-height: 600px; overflow: hidden;">
    
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="
            background-image: url('https://lh3.googleusercontent.com/gps-cs-s/AG0ilSym8lNkacH4zoaWKFBFZnYeZKDRWvbCJBLZZ-TDvo5CfPBz7nZ64j0OFcz8e1ET6czA_eLc9vpHEA08C1HfmMKahL23H2CcNG9HkURjwTKODKstRtr5O4Zndre5YYZpZyEIk0T9mgWi0nsD=s1360-w1360-h1020-rw');
            background-position: center 75%; 
            background-size: cover; 
            background-repeat: no-repeat; 
            z-index: -2;">
    </div>

    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.6); z-index: -1;"></div>

    <div class="container position-relative z-2">
        <div class="row">
            <div class="col-lg-8 text-white">
                <h1 class="display-3 fw-bold mb-2">Warkop <br> Omah Soeger</h1>
                <h4 class="fw-light mb-4" style="color: var(--color-gold); letter-spacing: 2px;">Coffee, Community, Competition.</h4>
                <p class="lead mb-5 w-75 d-none d-md-block" style="color: #ccc; font-size: 1rem;">
                    Tempat ngopi yang nyaman seperti dirumah sendiri. Wifi up to 100Mbps untuk komunitas gamers.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('menu') }}" class="btn btn-gold px-4 py-2 rounded-1" style="border-radius: 5px !important;">See Menu</a>
                    <a href="{{ route('events') }}" class="btn btn-info text-white px-4 py-2 rounded-1" style="background-color: var(--color-blue); border: none; border-radius: 5px !important;">Upcoming Tournaments</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #050505;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold">Upcoming E-Sport Events</h2>
            <p style="color: var(--color-blue);">Bergabunglah dengan turnamen gaming kami</p>
        </div>

        <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($events as $key => $event)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="card border-3 overflow-hidden mx-auto" style="background-color: #121212; max-width: 900px; border-radius: 15px; border: 10px solid var(--color-blue);">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ $event->poster ? asset($event->poster) : 'https://placehold.co/600x400/1a1a1a/00acee?text=Event+Poster' }}" 
                                     class="img-fluid h-100 w-100 object-fit-cover" 
                                     style="min-height: 300px;" alt="Event">
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 text-white text-start">
                                    @if($event->status == 'Open')
                                        <span class="badge bg-info text-dark mb-2">Coming Soon</span>
                                    @else
                                        <span class="badge bg-secondary mb-2">{{ $event->status }}</span>
                                    @endif
                                    
                                    <h3 class="card-title fw-bold mb-3">{{ $event->nama_event }}</h3>
                                    
                                    <div class="mb-4 text-secondary small">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <i class="bi bi-calendar-event text-info"></i> 
                                            {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <i class="bi bi-geo-alt-fill text-info"></i> Omah Soeger Arena
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-ticket-perforated-fill text-info"></i> 
                                            Rp {{ number_format($event->biaya_pendaftaran, 0, ',', '.') }}
                                        </div>
                                    </div>

                                    <a href="{{ route('events') }}" class="btn w-100 fw-bold py-2" 
                                       style="background-color: var(--color-blue); color: white; border-radius: 8px;">
                                        Register Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center text-muted py-5">Belum ada event mendatang.</div>
                @endforelse
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #4e342e; color: white;"> <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="position-relative shadow-lg rounded-4 overflow-hidden" style="height: 450px;">
                    <img src="https://lh3.googleusercontent.com/gps-cs-s/AG0ilSz4IhY72Yc58ps9Ci532yHJpiap5pFetKSlJ42vYYFuTrzlBi-dLwNf0LvuGFz5XUk4ogjSGZUvhLljJc7A2yMz2PMLUhIFAIO1cbX95MjtnMQp9g22praaxumgI2SSK_xChM_TekEgyiR7=s1360-w1360-h1020-rw" 
                         class="w-100 h-100" style="object-fit: cover; object-position: center" alt="Interior Cafe">
                </div>
            </div>
            
            <div class="col-lg-6 ps-lg-5">
                <h2 class="fw-bold mb-4" style="color: #e6d5c1;">Tentang Omah Soeger</h2>
                <p class="mb-4" style="opacity: 0.9;">
                    Warkop Omah Soeger adalah destinasi unik yang menggabungkan kenikmatan kopi berkualitas dengan passion untuk gaming dan e-sport.
                </p>
                <p class="mb-4" style="opacity: 0.9;">
                    Didirikan dengan visi untuk menciptakan komunitas yang solid, kami menyediakan ruang yang nyaman untuk bersantai sambil menikmati kopi favorit Anda atau berkompetisi dalam turnamen e-sport.
                </p>

                <h5 class="fw-bold mt-4 mb-3" style="color: #e6d5c1;">Visi Kami</h5>
                <p class="small opacity-75">Menjadi hub utama untuk komunitas gamers dan coffee lovers di Blitar.</p>

                <h5 class="fw-bold mt-4 mb-3" style="color: #e6d5c1;">Misi Kami</h5>
                <ul class="list-unstyled small opacity-90">
                    <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-info"></i>Menyajikan kopi berkualitas tinggi dengan harga terjangkau</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-info"></i>Membangun komunitas gamers yang positif dan suportif</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-info"></i>Menyelenggarakan turnamen e-sport berkualitas</li>
                </ul>

                <a href="{{ route('about') }}" class="btn mt-4 px-4 py-2" style="background-color: var(--color-blue); color: white; border-radius: 5px;">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #ffffff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Menu Favorit</h2>
            <p class="text-muted">Nikmati berbagai pilihan kopi dan makanan kami</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($menus->take(3) as $menu) 
            <div class="col-md-4">
                <div class="card h-100 rounded-4 overflow-hidden shadow-sm border-2" style="border-color: #4e342e;">
                    <div style="height: 250px; overflow: hidden;">
                        <img src="{{ $menu->gambar ? asset($menu->gambar) : 'https://placehold.co/400x300/e6d5c1/4e342e?text=Menu' }}" 
                             class="w-100 h-100 object-fit-cover" alt="{{ $menu->nama_menu }}">
                    </div>
                    
                    <div class="card-body p-4 text-start" style="background-color: #e6d5c1; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"> <h5 class="fw-bold text-dark mb-1">{{ $menu->nama_menu }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($menu->deskripsi, 40) }}</p>
                        <h5 class="fw-bold" style="color: var(--color-blue);">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if($menus->count() == 0)
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div style="height: 250px; background: #eee;"></div><div class="card-body p-4" style="background-color: #e6d5c1;"><h5 class="fw-bold text-dark">Espresso</h5><p class="text-muted small">Rich and bold coffee shot</p><h5 class="text-info">Rp 15.000</h5></div></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div style="height: 250px; background: #eee;"></div><div class="card-body p-4" style="background-color: #e6d5c1;"><h5 class="fw-bold text-dark">Iced Latte</h5><p class="text-muted small">Smooth and creamy iced coffee</p><h5 class="text-info">Rp 20.000</h5></div></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div style="height: 250px; background: #eee;"></div><div class="card-body p-4" style="background-color: #e6d5c1;"><h5 class="fw-bold text-dark">Cappuccino</h5><p class="text-muted small">Perfect balance of espresso</p><h5 class="text-info">Rp 18.000</h5></div></div></div>
            @endif
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('menu') }}" class="btn px-5 py-3" style="background-color: #4e342e; color: white; border-radius: 5px;">Lihat Menu Lengkap</a>
        </div>
    </div>
</section>

@endsection