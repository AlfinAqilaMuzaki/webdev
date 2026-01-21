<x-layouts.admin title="Manajemen Tipe Pembayaran">

    @if (session('success'))
        <div class="toast toast-bottom toast-center" id="success-toast">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
        setTimeout(() => {
            document.getElementById('success-toast')?.remove()
        }, 3000)
        </script>
    @endif

    @if ($errors->any())
        <div class="toast toast-bottom toast-center" id="error-toast">
            <div class="alert alert-error">
                <div>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
        setTimeout(() => {
            document.getElementById('error-toast')?.remove()
        }, 5000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Manajemen Tipe Pembayaran</h1>
                <p class="text-gray-500 mt-1">Kelola berbagai metode pembayaran yang tersedia dalam sistem</p>
            </div>
            <button class="btn btn-primary gap-2" onclick="add_modal.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Tipe Pembayaran
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-primary/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold text-gray-800">Daftar Tipe Pembayaran</h2>
                        <p class="text-sm text-gray-500">Total: {{ $tipePembayarans->count() }} tipe pembayaran</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="font-semibold text-gray-600">No</th>
                            <th class="font-semibold text-gray-600">Nama Tipe Pembayaran</th>
                            <th class="font-semibold text-gray-600">Dibuat Pada</th>
                            <th class="font-semibold text-gray-600 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tipePembayarans as $index => $tipePembayaran)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="font-medium">{{ $index + 1 }}</td>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-blue-50 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-800">{{ $tipePembayaran->nama }}</span>
                                    </div>
                                </td>
                                <td class="text-gray-500 text-sm">{{ $tipePembayaran->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="btn btn-sm btn-ghost btn-square text-info hover:bg-info/10" onclick="openShowModal(this)" data-id="{{ $tipePembayaran->id }}" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-ghost btn-square text-warning hover:bg-warning/10" onclick="openEditModal(this)" data-id="{{ $tipePembayaran->id }}" data-nama="{{ $tipePembayaran->nama }}" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-ghost btn-square text-error hover:bg-error/10" onclick="openDeleteModal(this)" data-id="{{ $tipePembayaran->id }}" data-nama="{{ $tipePembayaran->nama }}" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-12">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="p-4 bg-gray-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <p class="font-medium text-gray-600">Belum ada tipe pembayaran</p>
                                            <p class="text-sm text-gray-400">Klik tombol "Tambah Tipe Pembayaran" untuk menambahkan data baru</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Tipe Pembayaran Modal -->
    <dialog id="add_modal" class="modal modal-bottom sm:modal-middle">
        <form method="POST" action="{{ route('admin.tipe-pembayaran.store') }}" class="modal-box">
            @csrf
            <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="add_modal.close()">✕</button>

            <div class="flex items-center gap-3 mb-6">
                <div class="p-3 bg-primary/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Tambah Tipe Pembayaran</h3>
                    <p class="text-sm text-gray-500">Masukkan data tipe pembayaran baru</p>
                </div>
            </div>

            <div class="form-control w-full mb-6">
                <label class="label">
                    <span class="label-text font-medium">Nama Tipe Pembayaran <span class="text-error">*</span></span>
                </label>
                <input type="text" placeholder="Contoh: Transfer Bank, E-Wallet, Cash, QRIS" class="input input-bordered w-full focus:input-primary" name="nama" required />
                <label class="label">
                    <span class="label-text-alt text-gray-400">Nama harus unik dan belum terdaftar sebelumnya</span>
                </label>
            </div>

            <div class="modal-action">
                <button class="btn" type="button" onclick="add_modal.close()">Batal</button>
                <button class="btn btn-primary gap-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Show Detail Modal -->
    <dialog id="show_modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="show_modal.close()">✕</button>

            <div class="flex items-center gap-3 mb-6">
                <div class="p-3 bg-info/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-info">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Detail Tipe Pembayaran</h3>
                    <p class="text-sm text-gray-500">Informasi lengkap tipe pembayaran</p>
                </div>
            </div>

            <div id="show_loading" class="flex justify-center py-8">
                <span class="loading loading-spinner loading-lg text-primary"></span>
            </div>

            <div id="show_content" class="hidden">
                <div class="bg-gradient-to-r from-primary/5 to-info/5 rounded-xl p-6 mb-6">
                    <div class="flex items-center gap-4">
                        <div class="p-4 bg-white rounded-xl shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nama Tipe Pembayaran</p>
                            <h4 id="show_nama" class="text-2xl font-bold text-gray-800">-</h4>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="flex items-center gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class="text-sm text-gray-500">ID</span>
                        </div>
                        <p id="show_id" class="font-semibold text-gray-800">#-</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="flex items-center gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span class="text-sm text-gray-500">Dibuat Pada</span>
                        </div>
                        <p id="show_created_at" class="font-semibold text-gray-800">-</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 sm:col-span-2">
                        <div class="flex items-center gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span class="text-sm text-gray-500">Terakhir Diperbarui</span>
                        </div>
                        <p id="show_updated_at" class="font-semibold text-gray-800">-</p>
                    </div>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn" type="button" onclick="show_modal.close()">Tutup</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Edit Tipe Pembayaran Modal -->
    <dialog id="edit_modal" class="modal modal-bottom sm:modal-middle">
        <form method="POST" class="modal-box">
            @csrf
            @method('PUT')

            <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="edit_modal.close()">✕</button>

            <div class="flex items-center gap-3 mb-6">
                <div class="p-3 bg-warning/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-warning">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Edit Tipe Pembayaran</h3>
                    <p class="text-sm text-gray-500">Ubah data tipe pembayaran</p>
                </div>
            </div>

            <input type="hidden" name="tipe_pembayaran_id" id="edit_tipe_pembayaran_id">

            <div class="form-control w-full mb-6">
                <label class="label">
                    <span class="label-text font-medium">Nama Tipe Pembayaran <span class="text-error">*</span></span>
                </label>
                <input type="text" placeholder="Masukkan nama tipe pembayaran" class="input input-bordered w-full focus:input-warning" id="edit_tipe_pembayaran_name" name="nama" required />
                <label class="label">
                    <span class="label-text-alt text-gray-400">Nama harus unik dan belum terdaftar sebelumnya</span>
                </label>
            </div>

            <div class="modal-action">
                <button class="btn" type="button" onclick="edit_modal.close()">Batal</button>
                <button class="btn btn-warning gap-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal modal-bottom sm:modal-middle">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="delete_modal.close()">✕</button>

            <div class="flex items-center gap-3 mb-6">
                <div class="p-3 bg-error/10 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-error">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Hapus Tipe Pembayaran</h3>
                    <p class="text-sm text-gray-500">Konfirmasi penghapusan data</p>
                </div>
            </div>

            <input type="hidden" name="tipe_pembayaran_id" id="delete_tipe_pembayaran_id">

            <div class="bg-error/5 border border-error/20 rounded-xl p-4 mb-6">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-error flex-shrink-0">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <div>
                        <p class="font-medium text-error">Peringatan!</p>
                        <p class="text-sm text-gray-600 mt-1">Apakah Anda yakin ingin menghapus tipe pembayaran <strong id="delete_nama_text" class="text-error">ini</strong>? Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn" type="button" onclick="delete_modal.close()">Batal</button>
                <button class="btn btn-error gap-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    Ya, Hapus
                </button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
        function formatDate(dateString) {
            const options = {
                day: '2-digit',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }

        async function openShowModal(button) {
            const id = button.dataset.id;

            // Show modal with loading state
            document.getElementById('show_loading').classList.remove('hidden');
            document.getElementById('show_content').classList.add('hidden');
            show_modal.showModal();

            try {
                const response = await fetch(`/admin/tipe-pembayaran/${id}`);
                const data = await response.json();

                // Populate data
                document.getElementById('show_id').textContent = '#' + data.id;
                document.getElementById('show_nama').textContent = data.nama;
                document.getElementById('show_created_at').textContent = formatDate(data.created_at);
                document.getElementById('show_updated_at').textContent = formatDate(data.updated_at);

                // Hide loading, show content
                document.getElementById('show_loading').classList.add('hidden');
                document.getElementById('show_content').classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching data:', error);
                show_modal.close();
                alert('Gagal mengambil data tipe pembayaran');
            }
        }

        function openEditModal(button) {
            const name = button.dataset.nama;
            const id = button.dataset.id;
            const form = document.querySelector('#edit_modal form');

            document.getElementById("edit_tipe_pembayaran_name").value = name;
            document.getElementById("edit_tipe_pembayaran_id").value = id;

            // Set action dengan parameter ID
            form.action = `/admin/tipe-pembayaran/${id}`;

            edit_modal.showModal();
        }

        function openDeleteModal(button) {
            const id = button.dataset.id;
            const nama = button.dataset.nama;
            const form = document.querySelector('#delete_modal form');

            document.getElementById("delete_tipe_pembayaran_id").value = id;
            document.getElementById("delete_nama_text").textContent = `"${nama}"`;

            // Set action dengan parameter ID
            form.action = `/admin/tipe-pembayaran/${id}`;

            delete_modal.showModal();
        }
    </script>

</x-layouts.admin>
