<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prize>
 */
class PrizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campaign_id' => Campaign::factory(),
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'type' => fake()->randomElement(['main', 'secondary']),
            'prize_type' => fake()->randomElement(['cash', 'product', 'trip']),
            'cash_value' => fake()->randomElement([fake()->numberBetween(1000, 100000), null]),
            'winning_number' => fake()->randomElement([fake()->numberBetween(1, 5000), null]),
            'position' => fake()->numberBetween(0, 10),
        ];
    }
}
