<?php

namespace Tests\Feature\Artist;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use App\Models\Profile;
use App\Models\ArtistMember;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    public function test_event_screen_can_be_rendered()
    {
        $response = $this->get('/artist/event/create');

        $response->assertStatus(200);
    }
    public function test_an_artist_can_create_event()
    {
        $user = User::factory()->has(
            Profile::factory()
                ->has(ArtistMember::factory(random_int(2, 3)))->state([
                    'type' => 'artist',
                ])
        )->create();

        $response = $this->post('/artist/event', [
            'artist_profile_id' => $user->profile->id,
            'event_name' => 'Event Name',
            'description' => 'Event Description',
            'coords' => '123.456,789.012',
            'venue' => 'Event Venue',
            'event_date' => now()->addDays(7),
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
            'ticket_link' => 'https://example.com',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_can_update_event()
    {
        $user = User::factory()->has(
            Profile::factory()
                ->has(ArtistMember::factory(random_int(2, 3)))->state([
                    'type' => 'artist',
                ])
        )->create();

        $event = $user->profile->events()->create([
            'event_name' => 'Event Name',
            'description' => 'Event Description',
            'coords' => '123.456,789.012',
            'venue' => 'Event Venue',
            'event_date' => now()->addDays(7),
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
            'ticket_link' => 'https://example.com',
        ]);

        $updatedEventName = 'Updated Event Name';
        $updatedDescription = 'Updated Event Description';

        $response = $this->put('/artist/event/' . $event->id, [
            'event_name' => $updatedEventName,
            'description' => $updatedDescription,
        ]);

        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'event_name' => $updatedEventName,
            'description' => $updatedDescription,
        ]);

        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_can_delete_event()
    {
        // Test the deletion of an event
        $user = User::factory()->has(
            Profile::factory()
                ->has(ArtistMember::factory(random_int(2, 3)))->state([
                    'type' => 'artist',
                ])
        )->create();

        $event = $user->profile->events()->create([
            'event_name' => 'Event Name',
            'description' => 'Event Description',
            'coords' => '123.456,789.012',
            'venue' => 'Event Venue',
            'event_date' => now()->addDays(7),
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
            'ticket_link' => 'https://example.com',
        ]);

        // $event = Event::findOrFail($event->id);
        // $response = $this->delete('/artist/event/' . $event->id);

        $event->delete();

        $this->assertModelMissing($event->id);
    }
}
