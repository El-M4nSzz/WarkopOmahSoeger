<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'tanggal_event',
        'status',            // Open/Closed/Coming Soon
        'biaya_pendaftaran',
        'hadiah',
        'poster',            // Gambar
        'link_pendaftaran'   // Link WA/GForm
    ];
    
    // Tambahan: Agar tanggal otomatis dianggap sebagai Date (bukan teks biasa)
    protected $casts = [
        'tanggal_event' => 'date',
    ];
}
