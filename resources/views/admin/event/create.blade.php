@extends('layouts.main')

@section('title', 'Tambah Event Baru')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white" style="background-color: #222; border: 1px solid var(--color-blue);">
                <div class="card-header bg-dark border-bottom border-info">
                    <h4 class="mb-0" style="color: var(--color-blue);">Buat Jadwal Turnamen</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Turnamen</label>
                            <input type="text" name="nama_event" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Mobile Legends Cup Season 1" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal_event" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Pendaftaran</label>
                                <select name="status" class="form-select bg-dark text-white border-secondary">
                                    <option value="Open">Open (Dibuka)</option>
                                    <option value="Closed">Closed (Tutup)</option>
                                    <option value="Coming Soon">Coming Soon</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Biaya Pendaftaran (Rp)</label>
                                <input type="number" name="biaya_pendaftaran" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total Hadiah (Prize Pool)</label>
                                <input type="text" name="hadiah" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Rp 1.000.000 + Sertifikat" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Link Pendaftaran (Opsional)</label>
                            <input type="text" name="link_pendaftaran" class="form-control bg-dark text-white border-secondary" placeholder="Link WhatsApp atau Google Form">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Poster Event</label>
                            <input type="file" name="poster" class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn fw-bold" style="background-color: var(--color-blue); color: black;">
                                TERBITKAN EVENT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection