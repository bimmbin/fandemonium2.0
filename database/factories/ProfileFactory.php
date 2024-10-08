<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'profile_img_path' => 'default.jpg',
            'name' => $this->faker->name(),
            'background' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['fan', 'artist']),
        ];
    }
}
