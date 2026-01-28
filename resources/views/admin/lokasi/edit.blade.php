<x-layouts.admin title="Edit Lokasi">
    @if ($errors->any())
        <div class="toast toast-bottom toast-center z-50">
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
            setTimeout(() => {
                document.querySelector('.toast')?.remove()
            }, 5000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Edit Lokasi</h2>

                <form id="lokasiForm" class="space-y-4" method="post" action="{{ route('admin.lokasis.update', $lokasi->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Nama Lokasi -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nama Lokasi</span>
                        </label>
                        <input
                            type="text"
                            name="nama_lokasi"
                            placeholder="Contoh: Stadion Utama"
                            class="input input-bordered w-full"
                            value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}"
                            required />
                    </div>

                    <!-- Tombol Submit -->
                    <div class="card-actions justify-end mt-6">
                        <a href="{{ route('admin.lokasis.index') }}" class="btn btn-ghost">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Lokasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
