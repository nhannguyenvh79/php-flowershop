<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $flowerCategories = [
            'Hồng',
            'Hoa Ly',
            'Tulip',
            'Lan',
            'Hướng Dương',
            'Cúc Họa Mi',
            'Cẩm Chướng',
            'Cúc Vàng',
            'Hoa Gerbera',
            'Bó Hoa Hỗn Hợp',
            'Hoa Cưới',
            'Bó Hoa Sinh Nhật'
        ];

        return [
            'name' => fake()->unique()->randomElement($flowerCategories),
            'image' => 'categories/category-' . fake()->numberBetween(1, 10) . '.jpg',
            'description' => fake()->paragraph(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 12),
        ];
    }
}
