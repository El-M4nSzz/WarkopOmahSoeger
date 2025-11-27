<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'status' => 'required',
            'biaya_pendaftaran' => 'required|numeric',
            'hadiah' => 'required',
            'poster' => 'image|file|max:2048' // Max 2MB
        ]);

        $data = $request->all();

        if ($request->file('poster')) {
            $data['poster'] = $request->file('poster')->store('event-images', 'public');
            $data['poster'] = 'storage/' . $data['poster'];
        }

        Event::create($data);

        return redirect()->route('dashboard')->with('success', 'Event berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('dashboard')->with('success', 'Event berhasil dihapus.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        // Validasi (copy dari store, tapi poster jadi nullable/opsional)
        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'status' => 'required',
            'biaya_pendaftaran' => 'required|numeric',
            'hadiah' => 'required',
            'poster' => 'image|file|max:2048' 
        ]);

        $data = $request->all();

        if ($request->file('poster')) {
            $data['poster'] = $request->file('poster')->store('event-images', 'public');
            $data['poster'] = 'storage/' . $data['poster'];
        }

        $event->update($data);

        return redirect()->route('dashboard')->with('success', 'Event berhasil diperbarui!');
    }
}
