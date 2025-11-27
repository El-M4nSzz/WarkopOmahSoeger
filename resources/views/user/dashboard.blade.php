@extends('layouts.main')

@section('title', 'Dashboard Member')

@section('content')
<div class="container py-5">
    <div class="mb-4 text-white">
        <h2 class="fw-bold">Halo, {{ $user->name }}! 👋</h2>
        <p class="text" style="color: white">Selamat datang kembali di markas Omah Soeger.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden" style="background-color: #1a1a1a; color: white;">
                <div class="card-header border-0 py-4 text-center" style="background: linear-gradient(45deg, #4e342e, #a08155);">
                    <div class="rounded-circle bg-white mx-auto d-flex align-items-center justify-content-center shadow-sm mb-3" 
                         style="width: 100px; height: 100px; border: 4px solid rgba(255,255,255,0.3);">
                        <span class="fw-bold fs-1 text-dark">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <h5 class="mb-0 fw-bold">{{ $user->name }}</h5>
                    <small class="opacity-75">Member Sejati</small>
                </div>
                
                <div class="card-body p-4">
                    <div class="mb-3 pb-3 border-bottom border-secondary">
                        <small class="text d-block mb-1" style="color: white">Email Address</small>
                        <span class="fw-medium"><i class="bi bi-envelope me-2 text-warning"></i> {{ $user->email }}</span>
                    </div>
                    <div class="mb-3 pb-3 border-bottom border-secondary">
                        <small class="text d-block mb-1" style="color: white">Bergabung Sejak</small>
                        <span class="fw-medium"><i class="bi bi-calendar-check me-2 text-warning"></i> {{ $user->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="mb-4">
                        <small class="text d-block mb-1" style="color: white">Status Akun</small>
                        <span class="badge bg-success rounded-pill px-3">Active Member</span>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger w-100 rounded-3 py-2">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="p-3 rounded-3 d-flex align-items-center gap-3 border border-secondary" style="background-color: #121212;">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 text-primary">
                            <i class="bi bi-controller fs-4"></i>
                        </div>
                        <div>
                            <small class="text d-block" style="color: white">Event Diikuti</small>
                            <h4 class="fw-bold text-white m-0">0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3 d-flex align-items-center gap-3 border border-secondary" style="background-color: #121212;">
                        <div class="rounded-circle bg-warning bg-opacity-25 p-3 text-warning">
                            <i class="bi bi-cup-hot fs-4"></i>
                        </div>
                        <div>
                            <small class="text d-block" style="color: white">Total Pesanan</small>
                            <h4 class="fw-bold text-white m-0">0</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow rounded-4" style="background-color: #1a1a1a; min-height: 400px;">
                <div class="card-header border-bottom border-secondary bg-transparent">
                    <ul class="nav nav-tabs card-header-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-warning fw-bold" id="event-tab" data-bs-toggle="tab" data-bs-target="#event-pane" type="button" role="tab">
                                <i class="bi bi-trophy me-2"></i>Event Saya
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-pane" type="button" role="tab">
                                <i class="bi bi-receipt me-2"></i>Riwayat Pesanan
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body text-white">
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active p-3" id="event-pane" role="tabpanel">
                            <div class="text-center py-5">
                                <div class="mb-3 text-secondary opacity-50">
                                    <i class="bi bi-joystick fs-1"></i>
                                </div>
                                <h5>Belum ada event yang diikuti</h5>
                                <p class="text small mb-4" style="color: white">Ayo tunjukkan skillmu dan menangkan hadiahnya!</p>
                                <a href="{{ route('events') }}" class="btn btn-sm btn-primary px-4 rounded-pill">
                                    Cari Turnamen
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade p-3" id="order-pane" role="tabpanel">
                            <div class="text-center py-5">
                                <div class="mb-3 text-secondary opacity-50">
                                    <i class="bi bi-cup-straw fs-1"></i>
                                </div>
                                <h5>Belum ada riwayat pesanan</h5>
                                <p class="text small mb-4" style="color: white">Nikmati kopi terbaik kami sekarang.</p>
                                <a href="{{ route('menu') }}" class="btn btn-sm btn-warning text-dark px-4 rounded-pill">
                                    Lihat Menu
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.nav-link').forEach(t => {
                t.classList.remove('text-warning', 'fw-bold');
                t.classList.add('text-secondary');
            });
            this.classList.remove('text-secondary');
            this.classList.add('text-warning', 'fw-bold');
        });
    });
</script>
@endsection

<style>
    /* 1. Hilangkan background putih pada tab Aktif */
    .nav-tabs .nav-link.active {
        background-color: transparent !important; /* Transparan */
        border-color: transparent !important;     /* Hilangkan garis pinggir */
        border-bottom: 3px solid #a08155 !important; /* Ganti dengan garis bawah emas */
        color: #a08155 !important; /* Warna teks Emas */
    }

    /* 2. Atur warna tab yang Tidak Aktif */
    .nav-tabs .nav-link {
        color: #6c757d !important; /* Warna abu-abu */
        border: none !important;
        background-color: transparent !important;
    }

    /* 3. Efek saat mouse diarahkan (Hover) */
    .nav-tabs .nav-link:hover {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.05) !important; /* Sedikit terang */
        border-color: transparent !important;
    }
</style>