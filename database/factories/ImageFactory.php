<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'campaigns/' . fake()->uuid() . '.jpg',
            'disk' => 'public',
            'imageable_type' => Campaign::class,
            'imageable_id' => Campaign::factory(),
            'order_column' => fake()->numberBetween(0, 10),
            'is_primary' => fake()->boolean(10), // 10% chance of true
            'caption' => fake()->optional()->sentence(),
        ];
    }
}
