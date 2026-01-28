<x-layouts.app>
    
    <div class="hero bg-blue-900 min-h-screen">
        <div class="hero-content text-center text-white">
            <div class="max-w-4xl">
                <h1 class="text-5xl font-bold">Hi, Amankan Tiketmu yuk.</h1>
                <p class="py-6">
                    BengTix: Beli tiket, auto asik.
                </p>
            </div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto py-12 px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <h2 class="text-2xl font-black uppercase italic">Event</h2>
            
            <div class="flex gap-2 flex-wrap justify-center">
                <a href="{{ route('home') }}">
                    <x-user.category-pill :label="'Semua'" :active="!request('kategori')" />
                </a>

                @foreach($categories as $kategori)
                <a href="{{ route('home', ['kategori' => $kategori->id]) }}">
                    <x-user.category-pill :label="$kategori->nama" :active="request('kategori') == $kategori->id" />
                </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @forelse($events as $event)
                <x-user.event-card
                    :title="$event->judul"
                    :date="$event->tanggal_waktu"
                    :location="$event->lokasiRelasi ? $event->lokasiRelasi->nama_lokasi : $event->lokasi"
                    :price="$event->tikets_min_harga"
                    :image="$event->gambar"
                    :href="route('events.show', $event)"
                />
            @empty
                <div class="col-span-full text-center py-10">
                    <div class="text-gray-400 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada event yang tersedia untuk kategori ini.</p>
                </div>
            @endforelse

        </div>

    </section>
</x-layouts.app>