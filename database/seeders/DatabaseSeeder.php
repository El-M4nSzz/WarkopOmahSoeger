<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        // Pastikan import model User di paling atas: use App\Models\User;

        // 3. Buat Akun Admin
        User::create([
            'name' => 'Admin Warkop',
            'email' => 'admin@omahsoeger.com',
            'password' => bcrypt('password123'), // Password default
            'role' => 'admin', // Kita anggap nanti ada role 'user' biasa
        ]);

        // 1. Isi Data Menu (Warkop)
        DB::table('menus')->insert([
            [
                'nama_menu' => 'Kopi Tubruk Soeger',
                'kategori' => 'Minuman',
                'harga' => 8000,
                'deskripsi' => 'Kopi hitam robusta asli dampit dengan racikan tradisional.',
                'created_at' => now(),
            ],
            [
                'nama_menu' => 'Es Susu Gula Aren',
                'kategori' => 'Minuman',
                'harga' => 12000,
                'deskripsi' => 'Perpaduan susu segar dan gula aren murni.',
                'created_at' => now(),
            ],
            [
                'nama_menu' => 'Mie Goreng Spesial',
                'kategori' => 'Makanan',
                'harga' => 15000,
                'deskripsi' => 'Mie instan dengan topping telur, sosis, dan sayur.',
                'created_at' => now(),
            ]
        ]);

        // 2. Isi Data Event (E-Sport)
        DB::table('events')->insert([
            [
                'nama_event' => 'Mobile Legends Community Cup',
                'tanggal_event' => now()->addDays(7), // 7 hari lagi
                'status' => 'Open',
                'biaya_pendaftaran' => 50000,
                'hadiah' => 'Rp 1.500.000 + E-Certificate',
                'link_pendaftaran' => 'https://wa.me/6285607332887',
                'created_at' => now(),
            ],
            [
                'nama_event' => 'PUBG Mobile Blitar Championship',
                'tanggal_event' => now()->addDays(30),
                'status' => 'Coming Soon',
                'biaya_pendaftaran' => 75000,
                'hadiah' => 'Rp 3.000.000',
                'link_pendaftaran' => null,
                'created_at' => now(),
            ]
        ]);
    }
}
