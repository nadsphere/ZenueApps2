<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Paket;
use App\Eo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaketModelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'EO User',
            'email' => 'eo@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $this->eo = Eo::create([
            'user_id' => $this->user->id,
            'nama_eo' => 'Test EO',
            'email' => 'eo@test.com',
            'alamat' => 'Test Address',
            'kontak' => '081234567890',
        ]);
    }

    public function test_paket_can_be_created()
    {
        $paket = Paket::create([
            'id_eo' => $this->eo->id,
            'gambar_paket' => json_encode(['image1.jpg', 'image2.jpg']),
            'nama_paket' => 'Wedding Package',
            'kategori' => 'Wedding',
            'available' => 'yes',
            'deskripsi' => 'Beautiful wedding package',
            'harga_paket' => 25000000,
        ]);

        $this->assertDatabaseHas('pakets', [
            'nama_paket' => 'Wedding Package',
            'kategori' => 'Wedding',
        ]);
    }

    public function test_paket_belongs_to_eo()
    {
        $paket = Paket::create([
            'id_eo' => $this->eo->id,
            'gambar_paket' => json_encode(['image1.jpg']),
            'nama_paket' => 'Wedding Package',
            'kategori' => 'Wedding',
            'available' => 'yes',
            'deskripsi' => 'Test description',
            'harga_paket' => 25000000,
        ]);

        $this->assertEquals($this->eo->id, $paket->eo->id);
    }

    public function test_paket_can_get_images_as_array()
    {
        $paket = Paket::create([
            'id_eo' => $this->eo->id,
            'gambar_paket' => json_encode(['image1.jpg', 'image2.jpg']),
            'nama_paket' => 'Test Package',
            'kategori' => 'Wedding',
            'available' => 'yes',
            'deskripsi' => 'Test',
            'harga_paket' => 1000000,
        ]);

        $this->assertIsArray($paket->images);
        $this->assertCount(2, $paket->images);
    }

    public function test_paket_can_get_formatted_price()
    {
        $paket = Paket::create([
            'id_eo' => $this->eo->id,
            'gambar_paket' => json_encode(['image1.jpg']),
            'nama_paket' => 'Test Package',
            'kategori' => 'Wedding',
            'available' => 'yes',
            'deskripsi' => 'Test',
            'harga_paket' => 2500000,
        ]);

        $this->assertEquals('Rp 2,500,000', $paket->formatted_price);
    }
}
