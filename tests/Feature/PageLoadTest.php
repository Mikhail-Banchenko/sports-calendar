<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageLoadTest extends TestCase
{
    use RefreshDatabase;

    protected static bool $seeded = false;

    public function setUp(): void
    {
        parent::setUp();

        if (!static::$seeded) {
            $this->seed(\Database\Seeders\DatabaseSeeder::class);
            static::$seeded = true;
        }
    }

    /** @test */
    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome to Sport Calendar'); 
    }

    /** @test */
    public function test_events_page_loads_successfully()
    {
        $response = $this->get('/events');
        $response->assertStatus(200);
        $response->assertSee('Filter Events');
    }

    /** @test */
    public function test_guest_cannot_render_admin_panel()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_render_admin_panel()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    /** @test */
    public function test_admin_can_render_admin_panel()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Welcome to Admin Panel');
    }
}
