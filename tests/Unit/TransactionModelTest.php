<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Transaction;
use App\Paket;
use App\Eo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionModelTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_transaction_can_be_created()
    {
        $transaction = Transaction::create([
            'id_paket' => $this->paket->id,
            'kode_booking' => 'BK-123456',
            'email' => 'customer@example.com',
            'no_telp' => '081234567890',
            'tanggal_acara' => '2024-12-25',
            'status_pembayaran' => 0,
        ]);

        $this->assertDatabaseHas('transactions', [
            'kode_booking' => 'BK-123456',
            'email' => 'customer@example.com',
        ]);
    }

    public function test_transaction_belongs_to_paket()
    {
        $transaction = Transaction::create([
            'id_paket' => $this->paket->id,
            'kode_booking' => 'BK-123456',
            'email' => 'customer@example.com',
            'no_telp' => '081234567890',
            'tanggal_acara' => '2024-12-25',
            'status_pembayaran' => 0,
        ]);

        $this->assertEquals($this->paket->id, $transaction->paket->id);
    }

    public function test_transaction_status_labels()
    {
        $transaction = Transaction::create([
            'id_paket' => $this->paket->id,
            'kode_booking' => 'BK-123456',
            'email' => 'customer@example.com',
            'no_telp' => '081234567890',
            'tanggal_acara' => '2024-12-25',
            'status_pembayaran' => 0,
        ]);

        $this->assertEquals('Pending', $transaction->status_label);

        $transaction->status_pembayaran = 1;
        $this->assertEquals('Paid', $transaction->status_label);
    }
}
