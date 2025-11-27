@extends('layouts.main')
@section('title', 'Edit Menu')
@section('content')
<div class="container py-5">
    <div class="card text-white bg-dark border-warning mx-auto" style="max-width: 800px;">
        <div class="card-header"><h4>Edit Menu</h4></div>
        <div class="card-body">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}">
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Makanan" {{ $menu->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ $menu->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Snack" {{ $menu->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}">
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $menu->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Ganti Foto (Biarkan kosong jika tidak ingin mengganti)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning w-100">Update Menu</button>
            </form>
        </div>
    </div>
</div>
@endsection