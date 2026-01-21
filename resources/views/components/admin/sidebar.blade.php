<div class="drawer-side is-drawer-close:overflow-visible z-10">
    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
    
    <div class="flex min-h-full flex-col items-start bg-base-200 w-64 is-drawer-close:w-14 is-drawer-open:w-80 transition-all duration-300 text-base-content">
        
        <div class="w-full flex items-center justify-center p-6 border-b border-base-300">
            <img src="{{ asset('assets/images/logo_bengkod.svg') }}" alt="Logo" class="h-10 w-auto object-contain">
        </div>
        
        <ul class="menu w-full grow gap-2 p-4">
            
            <li class="{{ request()->routeIs('admin.dashboard') ? 'bg-white shadow rounded-lg' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="flex gap-4 font-medium" data-tip="Dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75" />
                    </svg>
                    <span class="is-drawer-close:hidden">Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.categories.*') ? 'bg-white shadow rounded-lg' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="flex gap-4 font-medium" data-tip="Kategori">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Kategori</span>
                </a>
            </li>
            
            <li class="{{ request()->routeIs('admin.events.*') ? 'bg-white shadow rounded-lg' : '' }}">
                <a href="{{ route('admin.events.index') }}" class="flex gap-4 font-medium" data-tip="Manajemen Event">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Event</span>
                </a>
            </li>
            
            <li class="{{ request()->routeIs('admin.histories.*') ? 'bg-white shadow rounded-lg' : '' }}">
                <a href="{{ route('admin.histories.index') }}" class="flex gap-4 font-medium" data-tip="History Pembelian">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span class="is-drawer-close:hidden">History Pembelian</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.tipe-pembayaran.*') ? 'bg-white shadow rounded-lg' : '' }}">
                <a href="{{ route('admin.tipe-pembayaran.index') }}" class="flex gap-4 font-medium" data-tip="Tipe Pembayaran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    <span class="is-drawer-close:hidden">Tipe Pembayaran</span>
                </a>
            </li>
        </ul>

        <div class="w-full p-4 border-t border-base-300 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline btn-error w-full flex items-center gap-2 justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10 17v-2h4v-2h-4v-2l-5 3l5 3m9-12H5q-.825 0-1.413.588T3 7v10q0 .825.587 1.413T5 19h14q.825 0 1.413-.587T21 17v-3h-2v3H5V7h14v3h2V7q0-.825-.587-1.413T19 5z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Logout</span>
                </button>
            </form>
        </div>

    </div>
</div>