<?php

namespace Database\Factories;

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
                'title'=> fake()->name(),
                'content' => fake()->paragraph(),
                'color' => fake()->safeHexColor(),
                'short_description' => fake()->text(100),
                'expiration' => fake()->dateTimeBetween('now', '+2 weeks'),
                'user_id' => fake()->numberBetween(1, 10),
                'created_by' => fake()->numberBetween(1, 3),
                'status_id' => fake()->numberBetween(1, 4),
        ];
    }
}
