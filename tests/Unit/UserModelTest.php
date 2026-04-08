<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
        ]);
    }

    public function test_user_password_is_hidden()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $array = $user->toArray();
        $this->assertArrayNotHasKey('password', $array);
    }

    public function test_user_can_be_eo()
    {
        $user = new User();
        $user->name = 'EO User';
        $user->email = 'eo@example.com';
        $user->no_telp = '081234567890';
        $user->password = bcrypt('password');
        $user->is_eo = 1;
        $user->is_renter = 0;
        $user->save();

        $this->assertTrue($user->is_eo == 1);
        $this->assertFalse($user->is_renter == 1);
    }

    public function test_user_has_eo_relationship()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password'),
            'is_eo' => 1,
            'is_renter' => 0,
        ]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $user->eo);
    }
}
