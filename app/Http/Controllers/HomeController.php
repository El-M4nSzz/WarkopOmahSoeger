<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;   // Pastikan Model Menu di-import
use App\Models\Event;  // Pastikan Model Event di-import

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data Event (untuk Carousel atas)
        $events = Event::where('status', '!=', 'Closed')->latest()->take(3)->get();
        
        // 2. TAMBAHAN BARU: Ambil data Menu (untuk bagian Menu Favorit bawah)
        $menus = Menu::all(); 

        // 3. Kirim kedua variabel ('events' DAN 'menus') ke view
        return view('home', compact('events', 'menus'));
    }

    // ... biarkan fungsi menu(), events(), about(), contact() lainnya tetap sama ...
    
    public function menu()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function events()
    {
        $events = Event::latest()->get();
        return view('events', compact('events'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}