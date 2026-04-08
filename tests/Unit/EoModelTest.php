<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Eo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EoModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_eo_can_be_created()
    {
        $user = User::create([
            'name' => 'EO User',
            'email' => 'eo@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $eo = Eo::create([
            'user_id' => $user->id,
            'nama_eo' => 'Test EO',
            'email' => 'eo@test.com',
            'alamat' => 'Test Address',
            'kontak' => '081234567890',
            'link' => 'https://test.com',
        ]);

        $this->assertDatabaseHas('eos', [
            'nama_eo' => 'Test EO',
            'user_id' => $user->id,
        ]);
    }

    public function test_eo_belongs_to_user()
    {
        $user = User::create([
            'name' => 'EO User',
            'email' => 'eo@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $eo = Eo::create([
            'user_id' => $user->id,
            'nama_eo' => 'Test EO',
            'email' => 'eo@test.com',
            'alamat' => 'Test Address',
            'kontak' => '081234567890',
        ]);

        $this->assertEquals($user->id, $eo->user->id);
    }

    public function test_eo_has_many_pakets()
    {
        $user = User::create([
            'name' => 'EO User',
            'email' => 'eo@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $eo = Eo::create([
            'user_id' => $user->id,
            'nama_eo' => 'Test EO',
            'email' => 'eo@test.com',
            'alamat' => 'Test Address',
            'kontak' => '081234567890',
        ]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $eo->pakets);
    }
}
