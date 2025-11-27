<?php

use Illuminate\Support\Facades\Route;

// Import Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserDashboardController;

// Import Middleware
use App\Http\Middleware\IsAdmin; 

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/profil', [HomeController::class, 'about'])->name('about');
Route::get('/lokasi', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| 2. ROUTE TAMU (Hanya untuk yang BELUM login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function() {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    // Register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

/*
|--------------------------------------------------------------------------
| 3. ROUTE KHUSUS ADMIN (WARKOP)
|--------------------------------------------------------------------------
| Middleware: Login ('auth') DAN Role Admin (IsAdmin::class)
*/
Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Menu (Tambah, Edit, Hapus)
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // CRUD Event (Tambah, Edit, Hapus)
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
});

/*
|--------------------------------------------------------------------------
| 4. ROUTE KHUSUS USER (MEMBER)
|--------------------------------------------------------------------------
| Middleware: Hanya perlu Login ('auth')
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

/*
|--------------------------------------------------------------------------
| 5. LOGOUT (Bisa diakses semua yang login)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');