<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PageLoadTest extends TestCase
{
    use RefreshDatabase;

    protected static bool $seeded = false;

    //set up the database before each test
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\DatabaseSeeder', 
        ]);

        //sometimes there are errors if there is no delay between creating DB and tests so i added a delay 
        usleep(500000);
    }

    //check if main page can be rendered 
    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome to Sport Calendar'); 
    }

    //check if events page can be rendered
    public function test_events_page_loads_successfully()
    {
        $response = $this->get('/events');
        $response->assertStatus(200);
        $response->assertSee('Filter Events');
    }

    //check if admin panel is not rendered for guest
    public function test_guest_cannot_render_admin_panel()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    //check if admin panel is not rendered for regular user
    public function test_regular_user_cannot_render_admin_panel()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    //check if admin panel is rendered for admin
    public function test_admin_can_render_admin_panel()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Welcome to Admin Panel');
    }
}
