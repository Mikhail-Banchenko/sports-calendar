<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        //check if login page is accessible
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_users_can_register_and_login(): void
    {
        //disable middleware to simplify testing
        $this->withoutMiddleware();

        //register a new user
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        //check if registration was successful and redirected to home
        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
    }
}
