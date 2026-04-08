<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
        ]);
    }

    public function test_user_registration_requires_valid_data()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'invalid-email',
            'no_telp' => '123',
            'password' => '123',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'no_telp', 'password']);
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password123'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $response = $this->post('/login', [
            'no_telp' => '081234567890',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password123'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $response = $this->post('/login', [
            'no_telp' => '081234567890',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest('users');
    }

    public function test_user_can_logout()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password123'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $this->actingAs($user, 'users');

        $response = $this->get('/logout');

        $this->assertGuest('users');
    }

    public function test_home_page_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page_loads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_page_loads()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register_as_eo()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '081234567890',
            'password' => bcrypt('password123'),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        $this->actingAs($user, 'users');

        $response = $this->post('/registereo', [
            'namaeo' => 'My EO',
            'emaileo' => 'eo@example.com',
            'alamateo' => 'Test Address',
            'kontakeo' => '081234567890',
        ]);

        $this->assertDatabaseHas('eos', [
            'nama_eo' => 'My EO',
            'user_id' => $user->id,
        ]);

        $this->assertEquals(1, $user->fresh()->is_eo);
    }
}
