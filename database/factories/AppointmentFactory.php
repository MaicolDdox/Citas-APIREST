<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'number' => fake()->regexify('[A-Za-z0-9]{30}'),
            'scheduled_at' => fake()->dateTime(),
            'place' => fake()->regexify('[A-Za-z0-9]{120}'),
            'reason' => fake()->text(),
            'status' => fake()->randomElement(["pending","confirmed","cancelled","completed"]),
        ];
    }
}
