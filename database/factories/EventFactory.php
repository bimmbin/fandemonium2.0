<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artist_profile_id' => Profile::factory(),
            'event_name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'coords' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'venue' => $this->faker->sentence(),
            'event_date' => $this->faker->dateTime(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'ticket_link' => $this->faker->url(),
        ];
    }
}
