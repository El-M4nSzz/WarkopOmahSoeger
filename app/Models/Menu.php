<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // TAMBAHKAN INI: Daftar kolom yang boleh diisi
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'gambar'
    ];
}
