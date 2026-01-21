<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $flowerBrands = [
            'Hoa Tươi Sài Gòn',
            'Bó Hoa Hạnh Phúc',
            'Thương Hiệu Hoa Tươi',
            'Hoa Tươi 24/7',
            'Vườn Hoa Tuyệt Vời',
            'Điệu Hoa Xinh',
            'Bó Hoa Rực Rỡ',
            'Hoa Tươi Premium',
            'Trang Trí Hoa Cao Cấp',
            'Hoa Tươi Cao Cấp VN',
            'Cửa Hàng Hoa Đắc Lợi',
            'Hoa Tươi Thảo Mộc'
        ];

        return [
            'name' => fake()->unique()->randomElement($flowerBrands),
            'image' => 'brands/brand-' . fake()->numberBetween(1, 10) . '.jpg',
            'description' => fake()->paragraph(),
            'is_active' => true,
        ];
    }
}
