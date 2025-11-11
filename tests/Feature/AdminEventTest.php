<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AdminEventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\DatabaseSeeder', 
        ]);

        usleep(500000);
    }

    public function test_admin_can_create_event()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'Stadium A',
            'description' => 'test description for test admin_can_create_event',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('events', ['description' => 'test description for test admin_can_create_event']);
    }

    public function test_regular_user_cannot_create_event()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'test venue',
            'description' => 'test description for test_regular_user_cannot_create_event',
        ]);

        $response->assertStatus(403); 
        $this->assertDatabaseMissing('events', ['description' => 'test description for test regular_user_cannot_create_event']);
    }

    public function test_guest_cannot_create_event()
    {
        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'test venue',
            'description' => 'test description for test guest_cannot_create_event',
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('events', ['description' => 'test description for test guest_cannot_create_event']);
    }

    public function test_admin_can_update_event()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $event = Event::firstOrFail();

        $response = $this->put("/admin/events/{$event->id}", [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => $event->_sport_id,
            '_team_left_id' => $event->_team_left_id,
            '_team_right_id' => $event->_team_right_id,
            'country' => 'test Country',
            'city' => 'test City',
            'venue' => 'test venue',
            'description' => 'test description for test admin_can_update_event',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'description' => 'test description for test admin_can_update_event',
        ]);
    }

    public function test_regular_user_cannot_update_event()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $event = Event::firstOrFail();

        $response = $this->put("/admin/events/{$event->id}", [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => $event->_sport_id,
            '_team_left_id' => $event->_team_left_id,
            '_team_right_id' => $event->_team_right_id,
            'country' => 'test Country',
            'city' => 'test City',
            'venue' => 'test venue',
            'description' => 'test description for test regular_user_cannot_update_event',
        ]);

        $response->assertStatus(403);
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
            'description' => 'test description for test regular_user_cannot_update_event',
        ]);
    }

    public function test_guest_cannot_update_event() 
    {
        $event = Event::firstOrFail();

        $response = $this->put("/admin/events/{$event->id}", [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => $event->_sport_id,
            '_team_left_id' => $event->_team_left_id,
            '_team_right_id' => $event->_team_right_id,
            'country' => 'test Country',
            'city' => 'test City',
            'venue' => 'test venue',
            'description' => 'test description for test regular_user_cannot_update_event',
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
            'description' => 'test description for test guest_cannot_create_event',
        ]);
    }

    public function test_admin_can_delete_event()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $event = Event::first();
        $this->actingAs($admin);

        $response = $this->delete("admin/events/{$event->id}");
        $response->assertRedirect();
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }

    public function test_regular_user_cannot_delete_event()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $event = Event::first();
        $this->actingAs($user);

        $response = $this->delete("admin/events/{$event->id}");
        $response->assertStatus(403);
        $this->assertDatabaseHas('events', ['id' => $event->id]);
    }

    public function test_guest_cannot_delete_event()
    {
        $event = Event::first();

        $response = $this->delete("admin/events/{$event->id}");
        $response->assertRedirect('/login');
        $this->assertDatabaseHas('events', ['id' => $event->id]);
    }
}
