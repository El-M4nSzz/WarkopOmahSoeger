@extends('layouts.main')

@section('title', 'Login Admin')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="card p-4 shadow" style="width: 400px; background-color: #222; border: 1px solid var(--color-blue);">
        <h3 class="text-center text-white mb-4">Login</h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn w-100 fw-bold" style="background-color: var(--color-blue);">MASUK</button>
        </form>
    </div>
</div>
@endsection