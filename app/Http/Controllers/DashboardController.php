<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data untuk ringkasan
        $totalMenu = Menu::count();
        $totalEvent = Event::count();
        
        // Ambil data terbaru
        $menus = Menu::latest()->get();
        $events = Event::latest()->get();

        return view('admin.dashboard', compact('totalMenu', 'totalEvent', 'menus', 'events'));
    }
}