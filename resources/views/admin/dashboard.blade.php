@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
        <h2 class="text-white">Dashboard Admin</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger fw-bold">Logout</button>
        </form>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card text-white bg-dark border-warning mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: var(--color-gold);">Total Menu</h5>
                    <p class="card-text display-4 fw-bold">{{ $totalMenu }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-dark border-info mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: var(--color-blue);">Total Event</h5>
                    <p class="card-text display-4 fw-bold">{{ $totalEvent }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-secondary mb-5">
        <div class="card-header d-flex justify-content-between align-items-center border-secondary">
            <h4 class="mb-0" style="color: var(--color-gold);">Daftar Menu Warkop</h4>
            <a href="{{ route('menu.create') }}" class="btn fw-bold" style="background-color: var(--color-gold); color: black;">
                + Tambah Menu Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr>
                            <td>
                                @if($menu->gambar)
                                    <img src="{{ asset($menu->gambar) }}" alt="img" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>{{ $menu->nama_menu }}</td>
                            <td><span class="badge bg-secondary">{{ $menu->kategori }}</span></td>
                            <td class="text-warning">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex gap-2" style="min-width: 140px;">
                                    <a href="{{ route('menu.edit', $menu->id) }}" 
                                        class="btn btn-sm btn-warning flex-fill fw-bold text-dark">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
        
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" 
                                            class="flex-fill" onsubmit="return confirm('Yakin hapus menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100 fw-bold">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Belum ada data menu.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-secondary">
        <div class="card-header d-flex justify-content-between align-items-center border-secondary">
            <h4 class="mb-0" style="color: var(--color-blue);">Daftar Event E-Sport</h4>
            <a href="{{ route('event.create') }}" class="btn fw-bold" style="background-color: var(--color-blue); color: black;">
                + Buat Event Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Poster</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td>
                                @if($event->poster)
                                    <img src="{{ asset($event->poster) }}" style="width: 40px; height: 60px; object-fit: cover; border-radius: 3px;">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>{{ $event->nama_event }}</td>
                            <td>{{ $event->tanggal_event->format('d M Y') }}</td>
                            <td>
                                @if($event->status == 'Open')
                                    <span class="badge bg-success">Open</span>
                                @elseif($event->status == 'Closed')
                                    <span class="badge bg-danger">Closed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Coming Soon</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2" style="min-width: 140px;">
                                    <a href="{{ route('event.edit', $event->id) }}" 
                                        class="btn btn-sm btn-warning flex-fill fw-bold text-dark">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
        
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" 
                                            class="flex-fill" onsubmit="return confirm('Hapus event ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100 fw-bold">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Belum ada jadwal turnamen.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection