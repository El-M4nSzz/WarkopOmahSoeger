@extends('layouts.main')

@section('title', 'Daftar Menu')

@section('content')

<section class="py-5 text-center" style="background-color: #4e342e; color: white;">
    <div class="container">
        <h1 class="fw-bold display-5 mb-2">Menu Warkop</h1>
        <p class="lead opacity-75" style="font-size: 1rem;">Nikmati berbagai pilihan kopi dan makanan berkualitas</p>
    </div>
</section>

<div class="container py-5" style="background-color: white;">
    
    <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
        <button class="btn btn-filter active px-4 rounded-pill" onclick="filterMenu('all', this)" 
                style="background-color: var(--color-blue); color: white; border: none;">
            Semua Menu
        </button>
        <button class="btn btn-filter px-4 rounded-pill" onclick="filterMenu('Minuman', this)" 
                style="background-color: #f0f0f0; color: #333; border: none;">
            Minuman
        </button>
        <button class="btn btn-filter px-4 rounded-pill" onclick="filterMenu('Makanan', this)" 
                style="background-color: #f0f0f0; color: #333; border: none;">
            Makanan
        </button>
        <button class="btn btn-filter px-4 rounded-pill" onclick="filterMenu('Snack', this)" 
                style="background-color: #f0f0f0; color: #333; border: none;">
            Makanan Ringan
        </button>
    </div>

    <div class="row g-4">
        @forelse($menus as $menu)
        <div class="col-md-4 col-lg-3 menu-item" data-category="{{ $menu->kategori }}">
            <div class="card h-100 border-2 rounded-3 overflow-hidden shadow-sm" style="border-color: #4e342e;">
                
                <div class="position-relative" style="padding-top: 75%;"> <img src="{{ $menu->gambar ? asset($menu->gambar) : 'https://placehold.co/400x400/4e342e/e3cba8?text=No+Image' }}" 
                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" 
                         alt="{{ $menu->nama_menu }}">
                </div>

                <div class="card-body p-4 d-flex flex-column" style="background-color: #e8d5b5;">
                    <h5 class="card-title fw-bold text-dark mb-1">{{ $menu->nama_menu }}</h5>
                    <p class="card-text text-muted small mb-3 flex-grow-1">{{ Str::limit($menu->deskripsi, 60) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="fw-bold fs-5" style="color: var(--color-blue);">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </span>
                        <a href="https://wa.me/6285649347525?text=Halo%20kak,%20saya%20mau%20pesan%20{{ urlencode($menu->nama_menu) }}" 
                           target="_blank" 
                           class="btn btn-sm px-3 py-1 rounded-1 text-white" 
                           style="background-color: #3e2723; font-size: 0.85rem;">
                           Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada menu yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>

<section class="py-5 text-center" style="background-color: #e8d5b5;">
    <div class="container">
        <h3 class="fw-bold text-dark mb-2">Siap Memesan?</h3>
        <p class="text-muted mb-4">Hubungi kami untuk pre-order atau reservasi tempat</p>
        
        <div class="d-flex justify-content-center gap-3">
            <a href="https://wa.me/6285649347525" target="_blank" class="btn px-4 py-2 text-white fw-bold" 
               style="background-color: var(--color-blue); border-radius: 5px;">
                <i class="bi bi-whatsapp me-2"></i>WhatsApp Kami
            </a>
            <a href="{{ route('contact') }}" class="btn px-4 py-2 text-white fw-bold" 
               style="background-color: #3e2723; border-radius: 5px;">
                Lihat Lokasi
            </a>
        </div>
    </div>
</section>

<script>
function filterMenu(category, btn) {
    // 1. Reset warna tombol
    document.querySelectorAll('.btn-filter').forEach(b => {
        b.style.backgroundColor = '#f0f0f0';
        b.style.color = '#333';
    });
    // 2. Highlight tombol aktif
    btn.style.backgroundColor = 'var(--color-blue)';
    btn.style.color = 'white';

    // 3. Logic Show/Hide
    let items = document.querySelectorAll('.menu-item');
    items.forEach(item => {
        if (category === 'all' || item.getAttribute('data-category') === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>

@endsection