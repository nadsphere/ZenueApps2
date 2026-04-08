<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Eo;
use App\Paket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $eo;
    protected $paket;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $this->eo_user = User::create([
            'name' => 'EO User',
            'email' => 'eo@example.com',
            'no_telp' => '081234567891',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $this->eo = Eo::create([
            'user_id' => $this->eo_user->id,
            'nama_eo' => 'Test EO',
            'email' => 'eo@test.com',
            'alamat' => 'Test Address',
            'kontak' => '081234567891',
        ]);

        $this->paket = Paket::create([
            'id_eo' => $this->eo->id,
            'gambar_paket' => json_encode(['image1.jpg']),
            'nama_paket' => 'Test Package',
            'kategori' => 'Wedding',
            'available' => 'yes',
            'deskripsi' => 'Test description',
            'harga_paket' => 25000000,
        ]);
    }

    public function test_ambil_paket_page_requires_auth()
    {
        $response = $this->get("/ambil_paket/{$this->paket->id}");

        $response->assertStatus(200); // Shows login page
    }

    public function test_authenticated_user_can_view_ambil_paket()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->get("/ambil_paket/{$this->paket->id}");

        $response->assertStatus(200);
    }

    public function test_transaction_can_be_created()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->post('/form_paket', [
            'email' => 'customer@example.com',
            'no_telp' => '081234567892',
            'nama_paket' => 'Test Package',
            'tanggalacara' => '2024-12-25',
        ]);

        $response->assertSessionHasNoErrors();
    }

    public function test_form_paket_requires_valid_data()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->post('/form_paket', [
            'email' => 'invalid-email',
            'no_telp' => '123',
            'nama_paket' => 'Test Package',
            'tanggalacara' => '2024-12-25',
        ]);

        $response->assertSessionHasErrors(['email', 'no_telp']);
    }
}
