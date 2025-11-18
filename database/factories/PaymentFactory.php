<?php

namespace Database\Factories;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'purchase_id' => Purchase::factory(),
            'payment_gateway' => fake()->randomElement(['mercadopago', 'pagseguro']),
            'gateway_payment_id' => fake()->uuid(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'cancelled']),
            'amount' => fake()->randomFloat(2, 10, 10000),
            'pix_qr_code' => fake()->optional()->uuid(),
            'pix_qr_code_base64' => fake()->optional()->uuid(),
            'pix_copy_paste' => fake()->optional()->uuid(),
            'expires_at' => fake()->optional()->dateTimeBetween('+1 hour', '+1 day'),
            'gateway_response' => json_encode(['test' => fake()->word()]),
        ];
    }
}
