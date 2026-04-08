<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Booking;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_can_be_created()
    {
        $pemesan = User::create([
            'name' => 'Pemesan',
            'email' => 'pemesan@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $renter = User::create([
            'name' => 'Renter',
            'email' => 'renter@example.com',
            'no_telp' => '081234567891',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 1,
        ]);

        $booking = Booking::create([
            'pemesan_id' => $pemesan->id,
            'renter_id' => $renter->id,
            'jenis_layanan' => 'Wedding',
            'lokasi' => 'Jakarta',
            'konsep_acara' => 'Traditional',
            'deskripsi_acara' => 'Beautiful wedding ceremony',
            'jumlah_tamu' => 200,
            'tanggal_acara' => '2024-12-25 10:00:00',
            'informasi' => 'Extra info',
            'is_accepted' => 0,
        ]);

        $this->assertDatabaseHas('bookings', [
            'jenis_layanan' => 'Wedding',
            'lokasi' => 'Jakarta',
            'is_accepted' => 0,
        ]);
    }

    public function test_booking_belongs_to_pemesan()
    {
        $pemesan = User::create([
            'name' => 'Pemesan',
            'email' => 'pemesan@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $renter = User::create([
            'name' => 'Renter',
            'email' => 'renter@example.com',
            'no_telp' => '081234567891',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 1,
        ]);

        $booking = Booking::create([
            'pemesan_id' => $pemesan->id,
            'renter_id' => $renter->id,
            'jenis_layanan' => 'Wedding',
            'lokasi' => 'Jakarta',
            'konsep_acara' => 'Traditional',
            'deskripsi_acara' => 'Test',
            'jumlah_tamu' => 100,
            'tanggal_acara' => '2024-12-25 10:00:00',
            'is_accepted' => 0,
        ]);

        $this->assertEquals($pemesan->id, $booking->pemesan->id);
    }

    public function test_booking_belongs_to_renter()
    {
        $pemesan = User::create([
            'name' => 'Pemesan',
            'email' => 'pemesan@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $renter = User::create([
            'name' => 'Renter',
            'email' => 'renter@example.com',
            'no_telp' => '081234567891',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 1,
        ]);

        $booking = Booking::create([
            'pemesan_id' => $pemesan->id,
            'renter_id' => $renter->id,
            'jenis_layanan' => 'Wedding',
            'lokasi' => 'Jakarta',
            'konsep_acara' => 'Traditional',
            'deskripsi_acara' => 'Test',
            'jumlah_tamu' => 100,
            'tanggal_acara' => '2024-12-25 10:00:00',
            'is_accepted' => 0,
        ]);

        $this->assertEquals($renter->id, $booking->renter->id);
    }
}
