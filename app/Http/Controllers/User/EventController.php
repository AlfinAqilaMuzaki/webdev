<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\TipePembayaran;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load(['tikets', 'kategori', 'user']);
        $tipePembayarans = TipePembayaran::all();

        return view('events.show', compact('event', 'tipePembayarans'));
    }
}
