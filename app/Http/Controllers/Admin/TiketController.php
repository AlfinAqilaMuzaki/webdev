<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Event;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     * Redirect ke halaman events karena tiket dikelola per-event
     */
    public function index()
    {
        return redirect()->route('admin.events.index')
            ->with('info', 'Tiket dikelola melalui halaman detail event.');
    }

    /**
     * Show the form for creating a new resource.
     * Redirect ke halaman events karena tiket dibuat dari detail event
     */
    public function create()
    {
        return redirect()->route('admin.events.index')
            ->with('info', 'Tambah tiket melalui halaman detail event.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'tipe' => 'required|in:reguler,premium',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        // Create the ticket
        Tiket::create($validatedData);

        return redirect()->route('admin.events.show', $validatedData['event_id'])
            ->with('success', 'Tiket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * Redirect ke halaman detail event
     */
    public function show(string $id)
    {
        $tiket = Tiket::findOrFail($id);
        return redirect()->route('admin.events.show', $tiket->event_id);
    }

    /**
     * Show the form for editing the specified resource.
     * Redirect ke halaman detail event karena edit via modal
     */
    public function edit(string $id)
    {
        $tiket = Tiket::findOrFail($id);
        return redirect()->route('admin.events.show', $tiket->event_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $ticket = Tiket::findOrFail($id);

            $validatedData = $request->validate([
                'tipe' => 'required|in:reguler,premium',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
            ]);

            $ticket->update($validatedData);

            return redirect()->route('admin.events.show', $ticket->event_id)
                ->with('success', 'Tiket berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui tiket: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ticket = Tiket::findOrFail($id);
            $eventId = $ticket->event_id;
            $ticket->delete();

            return redirect()->route('admin.events.show', $eventId)
                ->with('success', 'Tiket berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menghapus tiket: ' . $e->getMessage()]);
        }
    }
}
