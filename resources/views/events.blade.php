@extends('layouts.main')

@section('title', 'Info Turnamen')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5" style="color: var(--color-blue); text-shadow: 0 0 10px rgba(0, 212, 255, 0.5);">
            Turnamen E-Sport Blitar
        </h2>
        <p class="text" style="color:rgb(255, 255, 255)">Jadwal kompetisi resmi di Warkop Omah Soeger.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            @forelse($events as $event)
            <div class="card mb-4 text-white" style="background-color: #1a1a1a; border: 1px solid var(--color-blue);">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{{ $event->poster ?? 'https://placehold.co/400x500/001f3f/00d4ff?text=E-Sport+Event' }}" 
                             class="img-fluid rounded-start h-100 object-fit-cover" 
                             alt="Poster Event">
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h3 class="card-title fw-bold">{{ $event->nama_event }}</h3>
                                @if($event->status == 'Open')
                                    <span class="badge bg-success">Pendaftaran Dibuka</span>
                                @elseif($event->status == 'Closed')
                                    <span class="badge bg-danger">Selesai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Segera Hadir</span>
                                @endif
                            </div>

                            <p class="text mb-1" style="color: white">
                                📅 {{ \Carbon\Carbon::parse($event->tanggal_event)->isoFormat('dddd, D MMMM Y') }}
                            </p>
                            
                            <hr style="border-color: var(--color-blue);">

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-secondary">Biaya Pendaftaran</small>
                                    <p class="fw-bold text-white">Rp {{ number_format($event->biaya_pendaftaran, 0, ',', '.') }} / Tim</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-secondary">Total Prize Pool</small>
                                    <p class="fw-bold" style="color: var(--color-gold);">{{ $event->hadiah }}</p>
                                </div>
                            </div>

                            @if($event->link_pendaftaran && $event->status == 'Open')
                                <a href="{{ $event->link_pendaftaran }}" target="_blank" class="btn w-100 fw-bold" 
                                   style="background-color: var(--color-blue); color: #000;">
                                   Daftar Sekarang
                                </a>
                            @else
                                <button class="btn btn-secondary w-100" disabled>Pendaftaran Tutup / Belum Dibuka</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info text-center" role="alert">
                Belum ada jadwal turnamen dalam waktu dekat. Pantau terus Instagram kami!
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection