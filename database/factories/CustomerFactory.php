<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name('vi_VN'),
            'phone' => '0' . fake()->numberBetween(300000000, 999999999),
            'email' => fake()->unique()->safeEmail(),
            'address' => 'Quận ' . fake()->numberBetween(1, 12) . ', TP. Hồ Chí Minh',
        ];
    }
}
