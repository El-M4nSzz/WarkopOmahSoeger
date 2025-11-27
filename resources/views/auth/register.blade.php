@extends('layouts.main')

@section('title', 'Daftar Akun')

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg text-white bg-dark" style="width: 400px; border: 1px solid var(--color-blue);">
        <h3 class="text-center mb-4">Daftar Member</h3>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 small ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password (Min. 6 Karakter)</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn w-100 fw-bold" style="background-color: var(--color-blue); color: white;">
                DAFTAR SEKARANG
            </button>
        </form>
        
        <p class="mt-3 text-center small text-secondary">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-info text-decoration-none">Login disini</a>
        </p>
    </div>
</div>
@endsection