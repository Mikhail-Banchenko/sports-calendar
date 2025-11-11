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

    public function test_admin_can_create_event()
    {
        //create an admin user
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        //try to add new event
        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'Stadium A',
            'description' => 'test description for test admin_can_create_event',
        ]);

        //check if redirected after creation and event exists in database
        $response->assertRedirect();
        $this->assertDatabaseHas('events', ['description' => 'test description for test admin_can_create_event']);
    }

    public function test_regular_user_cannot_create_event()
    {
        //create a regular user
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        //try to add new event
        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'test venue',
            'description' => 'test description for test_regular_user_cannot_create_event',
        ]);

        //check for forbidden status and event absence in database
        $response->assertStatus(403); 
        $this->assertDatabaseMissing('events', ['description' => 'test description for test regular_user_cannot_create_event']);
    }

    public function test_guest_cannot_create_event()
    {
        //try to add new event when no user is authenticated
        $response = $this->post('/admin/events', [
            'date' => '2025-11-11',
            'time' => '12:00',
            '_sport_id' => 1,
            '_team_left_id' => 1,
            '_team_right_id' => 2,
            'venue' => 'test venue',
            'description' => 'test description for test guest_cannot_create_event',
        ]);

        //check for redirecting to login page and event absence in database
        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('events', ['description' => 'test description for test guest_cannot_create_event']);
    }

    public function test_admin_can_update_event()
    {
        //create an admin user
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        //get an existing event
        $event = Event::firstOrFail();

        //update the event
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

        //check for redirection and updated data in database
        $response->assertRedirect();
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'description' => 'test description for test admin_can_update_event',
        ]);
    }

    public function test_regular_user_cannot_update_event()
    {
        //create a regular user
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        //get an existing event
        $event = Event::firstOrFail();

        //try to update event
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

        //check for forbidden status and no changes for event
        $response->assertStatus(403);
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
            'description' => 'test description for test regular_user_cannot_update_event',
        ]);
    }

    public function test_guest_cannot_update_event() 
    {
        //get an existing event
        $event = Event::firstOrFail();

        //try to update event when no user is authenticated
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

        //check for redirecting and no changes for event
        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
            'description' => 'test description for test guest_cannot_create_event',
        ]);
    }

    public function test_admin_can_delete_event()
    {
        //create an admin user
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        //get an existing event
        $event = Event::first();

        //delete event, redirect and check if its deleted 
        $response = $this->delete("admin/events/{$event->id}");
        $response->assertRedirect();
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }

    public function test_regular_user_cannot_delete_event()
    {
        //create a regular user 
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        //get an existing event
        $event = Event::first();

        //try to delete event and check for forbiden status and that event is still existing 
        $response = $this->delete("admin/events/{$event->id}");
        $response->assertStatus(403);
        $this->assertDatabaseHas('events', ['id' => $event->id]);
    }

    public function test_guest_cannot_delete_event()
    {
        //get an existing event
        $event = Event::first();

        //try to delete event, redirect and check that event is still existing 
        $response = $this->delete("admin/events/{$event->id}");
        $response->assertRedirect('/login');
        $this->assertDatabaseHas('events', ['id' => $event->id]);
    }
}
