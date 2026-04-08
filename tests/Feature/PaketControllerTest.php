<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Eo;
use App\Paket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaketControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $eo;
    protected $paket;

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

    public function test_paket_index_requires_authentication()
    {
        $response = $this->get('/paket');

        $response->assertStatus(200); // Shows login page
    }

    public function test_authenticated_user_can_see_pakets()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->get('/paket');

        $response->assertStatus(200);
    }

    public function test_paket_can_be_created()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->post('/insert', [
            'nama_paket' => 'New Package',
            'kategori' => 'Concert',
            'available' => 'yes',
            'deskripsi' => 'New test package',
            'harga_paket' => 15000000,
        ]);

        $this->assertDatabaseHas('pakets', [
            'nama_paket' => 'New Package',
        ]);
    }

    public function test_paket_requires_valid_data()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->post('/insert', [
            'nama_paket' => '',
            'kategori' => '',
            'available' => '',
            'harga_paket' => '',
        ]);

        $response->assertSessionHasErrors(['nama_paket', 'kategori', 'available', 'gambar_paket']);
    }

    public function test_paket_can_be_updated()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->post("/update/{$this->paket->id}", [
            'nama_paket' => 'Updated Package',
            'kategori' => 'Party',
            'available' => 'no',
            'deskripsi' => 'Updated description',
            'harga_paket' => 30000000,
        ]);

        $this->assertDatabaseHas('pakets', [
            'id' => $this->paket->id,
            'nama_paket' => 'Updated Package',
        ]);
    }

    public function test_paket_can_be_deleted()
    {
        $this->actingAs($this->user, 'users');

        $paketId = $this->paket->id;

        $response = $this->get("/hapus_paket/{$paketId}");

        $this->assertDatabaseMissing('pakets', [
            'id' => $paketId,
        ]);
    }

    public function test_paket_details_can_be_viewed()
    {
        $response = $this->get("/detail_paket/{$this->paket->id}");

        $response->assertStatus(200);
    }

    public function test_paket_search_works()
    {
        $response = $this->post('/search', [
            'paket' => 'Test',
        ]);

        $response->assertStatus(200);
    }

    public function test_paket_edit_form_loads()
    {
        $this->actingAs($this->user, 'users');

        $response = $this->get("/paket_edit/{$this->paket->id}");

        $response->assertStatus(200);
    }
}
