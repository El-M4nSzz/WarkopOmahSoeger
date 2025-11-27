<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // 1. Tampilkan Form Tambah Menu
    public function create()
    {
        return view('admin.menu.create');
    }

    // 2. Simpan Data Menu ke Database
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'image|file|max:2048' // Maksimal 2MB
        ]);

        // Siapkan data untuk disimpan
        $data = $request->all();

        // Proses Upload Gambar (Jika ada)
        if ($request->file('gambar')) {
            // Simpan ke folder 'public/storage/menu-images'
            $data['gambar'] = $request->file('gambar')->store('menu-images', 'public');
            
            // Tambahkan prefix 'storage/' agar bisa diakses dari browser
            $data['gambar'] = 'storage/' . $data['gambar'];
        }

        // Simpan ke Database
        Menu::create($data);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil ditambahkan!');
    }
    
    // 3. Hapus Menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        
        // Hapus gambar lama jika ada (opsional, agar hemat storage)
        // if($menu->gambar) ... logika hapus file

        $menu->delete();
        return redirect()->route('dashboard')->with('success', 'Menu berhasil dihapus.');
    }

    // 4. Tampilkan Form Edit Menu}
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    // 5. Proses Update Data
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'image|file|max:2048'
        ]);

        $data = $request->all();

        // Cek jika ada gambar baru diupload
        if ($request->file('gambar')) {
            // Hapus gambar lama (Opsional, jika ingin hemat storage)
            // if($menu->gambar && Storage::exists($menu->gambar)) { Storage::delete($menu->gambar); }
            
            $data['gambar'] = $request->file('gambar')->store('menu-images', 'public');
            $data['gambar'] = 'storage/' . $data['gambar'];
        }

        $menu->update($data);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil diperbarui!');
    }
}