<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'no_hp' => '081234567890'
        ]);

        $user = User::create([
            'name' => 'User Customer',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'no_hp' => '089876543210'
        ]);

        $catMusik = Kategori::create(['nama' => 'Musik']);
        $catSeni = Kategori::create(['nama' => 'Seni']);
        $catFestival = Kategori::create(['nama' => 'Festival']);
<<<<<<< HEAD
        // Note: Di screenshot ada 'Workshop', mungkin itu kategori ke-4, tapi kita pakai 3 ini dulu sesuai event.

        // 2.5 Buat Lokasi (Sesuai Soal)
        $lokasiStadion = Lokasi::create(['nama_lokasi' => 'Stadion Utama']);
        $lokasiGaleri = Lokasi::create(['nama_lokasi' => 'Galeri Seni Kota']);
        $lokasiTaman = Lokasi::create(['nama_lokasi' => 'Taman Kota']);

        // 3. Buat Event (Sesuai Screenshot Modul)
        // Event ID 1
=======
   
>>>>>>> 3173d0a982039fa9be2d8587a2188fe72084b68d
        $event1 = Event::create([
            'user_id' => $admin->id,
            'kategori_id' => $catMusik->id,
            'lokasi_id' => $lokasiStadion->id,
            'judul' => 'Konser Musik Rock',
            'deskripsi' => 'Nikmati malam penuh energi dengan band rock ternama.',
            'lokasi' => 'Stadion Utama',
            'tanggal_waktu' => '2024-08-15 19:00:00',
            'gambar' => 'events/konser_rock.jpg'
        ]);

        $event2 = Event::create([
            'user_id' => $admin->id,
            'kategori_id' => $catSeni->id,
            'lokasi_id' => $lokasiGaleri->id,
            'judul' => 'Pameran Seni Kontemporer',
            'deskripsi' => 'Jelajahi karya seni modern dari seniman lokal dan internasional.',
            'lokasi' => 'Galeri Seni Kota',
            'tanggal_waktu' => '2024-05-10 10:00:00',
            'gambar' => 'events/pameran_seni.jpg'
        ]);

        $event3 = Event::create([
            'user_id' => $admin->id,
            'kategori_id' => $catFestival->id,
            'lokasi_id' => $lokasiTaman->id,
            'judul' => 'Festival Makanan Internasional',
            'deskripsi' => 'Cicipi berbagai hidangan lezat dari seluruh dunia.',
            'lokasi' => 'Taman Kota',
            'tanggal_waktu' => '2024-10-05 12:00:00',
            'gambar' => 'events/festival_makanan.jpg'
        ]);


        $tiket1 = Tiket::create([
            'event_id' => $event1->id,
            'tipe' => 'premium',
            'harga' => 1500000,
            'stok' => 100
        ]);

        Tiket::create([
            'event_id' => $event1->id,
            'tipe' => 'reguler',
            'harga' => 500000,
            'stok' => 500
        ]);

        $tiket3 = Tiket::create([
            'event_id' => $event2->id,
            'tipe' => 'premium',
            'harga' => 200000,
            'stok' => 300
        ]);

        Tiket::create([
            'event_id' => $event3->id,
            'tipe' => 'premium',
            'harga' => 300000,
            'stok' => 200
        ]);

 
        $order1 = Order::create([
            'user_id' => $user->id,
            'event_id' => $event1->id,
            'order_date' => '2024-07-01 14:30:00',
            'total_harga' => 1500000
        ]);
        DetailOrder::create([
            'order_id' => $order1->id,
            'tiket_id' => $tiket1->id, 
            'jumlah' => 1,
            'subtotal_harga' => 1500000
        ]);

        $order2 = Order::create([
            'user_id' => $user->id,
            'event_id' => $event2->id,
            'order_date' => '2024-07-02 10:15:00',
            'total_harga' => 200000
        ]);
        DetailOrder::create([
            'order_id' => $order2->id,
            'tiket_id' => $tiket3->id, 
            'jumlah' => 1,
            'subtotal_harga' => 200000
        ]);
    }
}
