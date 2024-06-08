<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use App\Models\ArtistMember;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Queue\Events\Looping;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fan_account_can_be_seed(): void
    {
        $response = User::factory()->has(
            Profile::factory()->state([
                'type' => 'fan',
            ])
        )->create();

        $this->assertDatabaseHas('users', ['id' => $response->id]);
        $this->assertDatabaseHas('profiles', ['id' => $response->profile->id, 'user_id' => $response->id]);
    }

    public function test_artist_account_can_be_seed(): void
    {
        $response = User::factory()->has(
            Profile::factory()
                ->has(ArtistMember::factory(random_int(2, 3)))->state([
                    'type' => 'artist',
                ])
        )->create();

        $this->assertDatabaseHas('users', ['id' => $response->id]);
        $this->assertDatabaseHas('profiles', ['id' => $response->profile->id, 'user_id' => $response->id]);
        // loop through the artist members and check if they exist in the database
        foreach ($response->profile->artistMembers as $artistMember) {
            $this->assertDatabaseHas('artist_members', ['id' => $artistMember->id, 'artist_profile_id' => $response->profile->id]);
        }
    }
}
