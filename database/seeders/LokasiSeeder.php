<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data sesuai soal
        Lokasi::create([
            'id' => 1,
            'nama_lokasi' => 'Stadion Utama',
        ]);

        Lokasi::create([
            'id' => 2,
            'nama_lokasi' => 'Galeri Seni Kota',
        ]);

        Lokasi::create([
            'id' => 3,
            'nama_lokasi' => 'Taman Kota',
        ]);
    }
}
