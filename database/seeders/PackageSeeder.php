<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample EO first
        $eoId = DB::table('eos')->insertGetId([
            'user_id' => 1,
            'nama_eo' => 'Parama Creative',
            'email' => 'parama@example.com',
            'alamat' => 'Jakarta Pusat, Indonesia',
            'kontak' => '081234567890',
            'link' => 'https://paramacreative.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create second EO
        $eoId2 = DB::table('eos')->insertGetId([
            'user_id' => 1,
            'nama_eo' => 'Moment n Co.',
            'email' => 'moment@example.com',
            'alamat' => 'Jakarta Timur, Indonesia',
            'kontak' => '089876543210',
            'link' => 'https://momentco.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create third EO
        $eoId3 = DB::table('eos')->insertGetId([
            'user_id' => 1,
            'nama_eo' => 'FUN Party',
            'email' => 'funparty@example.com',
            'alamat' => 'Jakarta Selatan, Indonesia',
            'kontak' => '087712345678',
            'link' => 'https://funparty.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Wedding Packages
        DB::table('pakets')->insert([
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['wedding-1.jpg', 'wedding-2.jpg']),
                'nama_paket' => 'Paket Pernikahan Gold',
                'kategori' => 'Wedding',
                'available' => 'tersedia',
                'deskripsi' => 'Paket lengkap pernikahan dengan dekorasi premium, MC profesional, dokumentasi full, dan hiburan live music.',
                'harga_paket' => 50000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['wedding-3.jpg']),
                'nama_paket' => 'Paket Pernikahan Silver',
                'kategori' => 'Wedding',
                'available' => 'tersedia',
                'deskripsi' => 'Paket pernikahan ekonomis dengan standar kualitas tinggi, cocok untuk upacara intimate.',
                'harga_paket' => 25000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId2,
                'gambar_paket' => json_encode(['wedding-4.jpg', 'wedding-5.jpg']),
                'nama_paket' => 'Paket Wedding Premium',
                'kategori' => 'Wedding',
                'available' => 'tersedia',
                'deskripsi' => 'Paket premium dengan konsep modern, include bridal preparation dan honeymoon arrangement.',
                'harga_paket' => 75000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Party Packages
            [
                'id_eo' => $eoId3,
                'gambar_paket' => json_encode(['party-1.jpg']),
                'nama_paket' => 'Paket Ulang Tahun Kids',
                'kategori' => 'Party',
                'available' => 'tersedia',
                'deskripsi' => 'Paket ulang tahun anak dengan tema menarik, properti foto, balloon decoration, dan games seru.',
                'harga_paket' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId3,
                'gambar_paket' => json_encode(['party-2.jpg']),
                'nama_paket' => 'Paket Party Dewasa',
                'kategori' => 'Party',
                'available' => 'tersedia',
                'deskripsi' => 'Paket party untuk dewasa dengan live DJ, cocktail bar, dan sophisticated decoration.',
                'harga_paket' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId2,
                'gambar_paket' => json_encode(['party-3.jpg']),
                'nama_paket' => 'Paket Baby Shower',
                'kategori' => 'Party',
                'available' => 'tersedia',
                'deskripsi' => 'Paket baby shower elegant dengan tema soft color, gift corner, dan afternoon tea setup.',
                'harga_paket' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Concert Packages
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['concert-1.jpg']),
                'nama_paket' => 'Paket Concert Small Scale',
                'kategori' => 'Concert',
                'available' => 'tersedia',
                'deskripsi' => 'Paket konser skala kecil untuk 200-500 penonton dengan sound system professional.',
                'harga_paket' => 35000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['concert-2.jpg']),
                'nama_paket' => 'Paket Concert Medium Scale',
                'kategori' => 'Concert',
                'available' => 'tersedia',
                'deskripsi' => 'Paket konser skala menengah untuk 500-1000 penonton dengan stage production lengkap.',
                'harga_paket' => 75000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Conference Packages
            [
                'id_eo' => $eoId2,
                'gambar_paket' => json_encode(['conference-1.jpg']),
                'nama_paket' => 'Paket Seminar Corporate',
                'kategori' => 'Conference',
                'available' => 'tersedia',
                'deskripsi' => 'Paket seminar dengan projector HD, sound system, registrasi system, dan coffee break.',
                'harga_paket' => 12000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId2,
                'gambar_paket' => json_encode(['conference-2.jpg']),
                'nama_paket' => 'Paket Workshop Training',
                'kategori' => 'Conference',
                'available' => 'tersedia',
                'deskripsi' => 'Paket workshop dengan materials, breakout room, dan sertifikat untuk peserta.',
                'harga_paket' => 18000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Catering Packages
            [
                'id_eo' => $eoId3,
                'gambar_paket' => json_encode(['catering-1.jpg']),
                'nama_paket' => 'Paket Catering Prasmanan 100 Porsi',
                'kategori' => 'Catering',
                'available' => 'tersedia',
                'deskripsi' => 'Paket catering prasmanan lengkap 100 porsi dengan menu Nusantara premium.',
                'harga_paket' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId3,
                'gambar_paket' => json_encode(['catering-2.jpg']),
                'nama_paket' => 'Paket Nasi Box 200 Box',
                'kategori' => 'Catering',
                'available' => 'tersedia',
                'deskripsi' => 'Paket nasi box ekonomis 200 box dengan menu bervariasi, cocok untuk event kantor.',
                'harga_paket' => 6000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Rental Packages
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['rental-1.jpg']),
                'nama_paket' => 'Rental Sound System Premium',
                'kategori' => 'Rental',
                'available' => 'tersedia',
                'deskripsi' => 'Sewa sound system premium termasuk operator, cocok untuk event indoor maupun outdoor.',
                'harga_paket' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_eo' => $eoId,
                'gambar_paket' => json_encode(['rental-2.jpg']),
                'nama_paket' => 'Rental Tenda Premium 10x20m',
                'kategori' => 'Rental',
                'available' => 'tersedia',
                'deskripsi' => 'Sewa tende premium dengan AC portable dan lighting decoration included.',
                'harga_paket' => 25000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        echo "Sample packages created successfully!\n";
    }
}
