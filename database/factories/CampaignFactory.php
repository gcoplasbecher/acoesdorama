<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'total_numbers' => fake()->numberBetween(100, 5000),
            'min_first_purchase' => fake()->numberBetween(1, 10),
            'max_per_purchase' => fake()->numberBetween(11, 500),
            'price_per_number' => fake()->randomFloat(2, 1, 100),
            'draw_date' => now()->addDays(fake()->numberBetween(7, 365))->format('Y-m-d'),
            'is_active' => fake()->boolean(80),
        ];
    }
}
