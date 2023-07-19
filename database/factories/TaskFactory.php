<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title'=> fake()->title(),
                'content' => fake()->paragraph(),
                'expiration' => fake()->dateTimeBetween(),
                'user_id' => fake()->numberBetween(1, 10),
                'status_id' => fake()->numberBetween(1, 4),
        ];
    }
}
