@extends('layouts.main')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white" style="background-color: #222; border: 1px solid var(--color-gold);">
                <div class="card-header bg-dark border-bottom border-warning">
                    <h4 class="mb-0" style="color: var(--color-gold);">Tambah Menu Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control bg-dark text-white border-secondary" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-select bg-dark text-white border-secondary">
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Snack">Snack</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="deskripsi" rows="3" class="form-control bg-dark text-white border-secondary"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Menu</label>
                            <input type="file" name="gambar" class="form-control bg-dark text-white border-secondary">
                            <div class="form-text text-muted">Format: JPG, PNG (Max 2MB).</div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn fw-bold" style="background-color: var(--color-gold); color: black;">
                                SIMPAN MENU
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection