@extends('layouts.main')

@section('title', 'Profil Warkop')

@section('content')

<section class="py-5 text-center" style="background-color: #4e342e; color: white;">
    <div class="container py-4">
        <h1 class="fw-bold display-5 mb-2">Profil Warkop Omah Soeger</h1>
        <p class="lead opacity-75" style="font-size: 1.1rem;">Lebih dari sekadar warkop - kami adalah komunitas</p>
    </div>
</section>

<section class="py-5" style="background-color: #dcc7a8;">
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 mx-auto p-4 p-md-5" style="max-width: 1000px; background-color: white;">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center" 
                     style="width: 50px; height: 50px; background-color: var(--color-blue); color: white;">
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <h2 class="fw-bold text-dark m-0">Sejarah Kami</h2>
            </div>
            
            <p class="text-muted" style="line-height: 1.8;">
                Warkop Omah Soeger didirikan pada tahun 2023 dengan semangat untuk menciptakan ruang yang menyatukan dua passion: kopi berkualitas dan gaming culture.
            </p>
            <p class="text-muted" style="line-height: 1.8;">
                Berawal dari sebuah warung kopi sederhana, kami berkembang menjadi destinasi favorit bagi para pecinta kopi dan gamers di Blitar. Dengan konsep unik yang menggabungkan kenyamanan coffee shop tradisional dengan teknologi modern untuk gaming.
            </p>
            <p class="text-muted m-0" style="line-height: 1.8;">
                Kami percaya bahwa tempat terbaik untuk berkumpul adalah di mana orang dapat menikmati kopi yang sempurna sambil berbagi passion mereka untuk gaming dan e-sport.
            </p>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #3e2723;">
    <div class="container py-4">
        <div class="row g-4">
            
            <div class="col-md-6">
                <div class="h-100 p-5 rounded-4 border" style="background-color: rgba(255,255,255,0.05); border-color: var(--color-blue) !important;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 40px; height: 40px; background-color: var(--color-blue); color: white;">
                            <i class="bi bi-eye fs-5"></i>
                        </div>
                        <h3 class="fw-bold text-white m-0">Visi Kami</h3>
                    </div>
                    
                    <p class="text-white opacity-75 mb-4" style="line-height: 1.6;">
                        Menjadi hub utama untuk komunitas gamers dan coffee lovers di Blitar, menciptakan ruang yang menginspirasi kolaborasi, kompetisi sehat, dan apresiasi terhadap kopi berkualitas.
                    </p>

                    <div class="p-3 rounded-3" style="background-color: rgba(255,255,255,0.1);">
                        <p class="m-0 text-white fst-italic small text-center">"Membangun komunitas melalui kopi dan gaming"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="h-100 p-5 rounded-4 border" style="background-color: rgba(255,255,255,0.05); border-color: #a08155 !important;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 40px; height: 40px; background-color: #a08155; color: white;">
                            <i class="bi bi-lightbulb fs-5"></i>
                        </div>
                        <h3 class="fw-bold text-white m-0">Misi Kami</h3>
                    </div>

                    <ul class="list-unstyled text-white opacity-75" style="line-height: 2;">
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <i class="bi bi-circle-fill mt-2" style="font-size: 6px; color: var(--color-blue);"></i>
                            Menyajikan kopi berkualitas tinggi dengan harga terjangkau untuk semua kalangan
                        </li>
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <i class="bi bi-circle-fill mt-2" style="font-size: 6px; color: var(--color-blue);"></i>
                            Membangun komunitas gamers yang positif, supportif, dan inklusif
                        </li>
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <i class="bi bi-circle-fill mt-2" style="font-size: 6px; color: var(--color-blue);"></i>
                            Menyelenggarakan turnamen e-sport berkualitas dengan prize pool menarik
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-circle-fill mt-2" style="font-size: 6px; color: var(--color-blue);"></i>
                            Menciptakan suasana yang nyaman untuk bekerja, belajar, dan bersosialisasi
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5" style="background-color: #dcc7a8;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Mengapa Orang Menyukai Kami</h2>
            <p class="text-muted">Alasan yang membuat Omah Soeger istimewa</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-start">
                    <div class="mb-3 text-primary p-2 rounded-3 d-inline-block" style="background-color: #e3f2fd;">
                        <i class="bi bi-cup-hot fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kopi Berkualitas</h5>
                    <p class="text-muted small">Kami hanya menggunakan biji kopi pilihan terbaik yang diracik oleh barista profesional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-start">
                    <div class="mb-3 text-info p-2 rounded-3 d-inline-block" style="background-color: #e1f5fe;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Komunitas Solid</h5>
                    <p class="text-muted small">Bertemu dengan gamers dan coffee enthusiasts yang memiliki passion yang sama.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-start">
                    <div class="mb-3 text-warning p-2 rounded-3 d-inline-block" style="background-color: #fff8e1;">
                        <i class="bi bi-trophy fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Turnamen Rutin</h5>
                    <p class="text-muted small">Event e-sport berkualitas dengan hadiah menarik setiap bulannya.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-start">
                    <div class="mb-3 text-danger p-2 rounded-3 d-inline-block" style="background-color: #ffebee;">
                        <i class="bi bi-heart fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Suasana Nyaman</h5>
                    <p class="text-muted small">Interior modern dengan WiFi kencang dan fasilitas lengkap untuk kenyamanan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Galeri Warkop</h2>
            <p class="text-muted">Lihat suasana Omah Soeger</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="rounded-4 overflow-hidden shadow-sm" style="height: 250px;">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipNpffyeWnv3XLV9YN9qRJ1JKpwjr5hQAkCT2F4=s1360-w1360-h1020-rw" 
                         class="w-100 h-100 object-fit-cover" alt="Galeri 1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="rounded-4 overflow-hidden shadow-sm" style="height: 250px;">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipM63IDSZgHVFyrRP8V0dSz6dfqUj4dCALYQ61Y=s1360-w1360-h1020-rw" 
                         class="w-100 h-100 object-fit-cover" alt="Galeri 2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="rounded-4 overflow-hidden shadow-sm" style="height: 250px;">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipMz7aX9INtPYt1t8inWgZb0g1oZm2jAkdjAgH0=s1360-w1360-h1020-rw" 
                         class="w-100 h-100 object-fit-cover" alt="Galeri 3">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection