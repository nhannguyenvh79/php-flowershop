<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']);
        
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id ?? Customer::factory(),
            'total_amount' => fake()->randomFloat(2, 300000, 5000000),
            'status' => $status,
            'notes' => fake()->optional(0.7)->sentence(),
            'payment_method' => fake()->randomElement(['COD', 'Chuyển khoản', 'Thẻ tín dụng']),
            'payment_status' => fake()->randomElement(['pending', 'paid', 'refunded', 'failed']),
            'processing_at' => in_array($status, ['processing', 'shipped', 'delivered']) ? fake()->dateTimeBetween('-30 days') : null,
            'shipped_at' => in_array($status, ['shipped', 'delivered']) ? fake()->dateTimeBetween('-15 days') : null,
            'delivered_at' => $status === 'delivered' ? fake()->dateTimeBetween('-7 days') : null,
            'cancelled_at' => $status === 'cancelled' ? fake()->dateTimeBetween('-7 days') : null,
            'tracking_number' => in_array($status, ['shipped', 'delivered']) ? 'VN' . fake()->numerify('##########') : null,
            'shipping_address' => fake()->optional(0.8)->address(),
        ];
    }
}
