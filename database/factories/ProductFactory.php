<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $flowerTypes = [
            'Hồng', 'Hướng Dương', 'Tulip', 'Lan', 'Hoa Ly', 'Cúc Họa Mi',
            'Cẩm Chướng', 'Cúc Vàng', 'Hoa Mẫu Đơn', 'Cẩm Tú Cầu',
            'Hoa Gerbera', 'Xà Phòng', 'Hoa Oải Hương', 'Vạn Thọ', 'Hoa Nhài'
        ];

        $arrangements = [
            'Bó Hoa', 'Trang Trí', 'Bộ Sưu Tập', 'Gói Hoa', 'Bản Giao Hưởng',
            'Thanh Lịch', 'Vui Thích', 'Đẹp Lãng Mạn', 'Phép Màu', 'Bất Ngờ'
        ];

        $occasions = [
            'Cưới', 'Sinh Nhật', 'Tình Yêu', 'Kỷ Niệm', 'Chia Buồn',
            'Chúc Bình Phục', 'Chào Đón Em Bé', 'Chúc Mừng', 'Cảm Ơn', 'Tốt Nghiệp',
            'Ngày Mẹ', 'Mùa Xuân', 'Mùa Hè', 'Mùa Thu', 'Mùa Đông'
        ];

        // Generate random flower product name
        $namePattern = fake()->randomElement([
            fake()->randomElement($flowerTypes) . ' ' . fake()->randomElement($arrangements),
            fake()->randomElement($occasions) . ' ' . fake()->randomElement($flowerTypes),
            fake()->randomElement($flowerTypes) . ' ' . fake()->randomElement($occasions) . ' ' . fake()->randomElement($arrangements),
            'Hỗn Hợp ' . fake()->randomElement($flowerTypes) . ' ' . fake()->randomElement($arrangements),
        ]);

        return [
            'name' => $namePattern,
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()->id ?? Brand::factory(),
            'price' => fake()->randomFloat(0, 150000, 1000000),
            'description' => fake()->paragraphs(3, true),
            'image' => 'products/product-' . fake()->numberBetween(1, 20) . '.jpg',
            'stock' => fake()->numberBetween(5, 100),
            'is_active' => fake()->boolean(90),
            'is_featured' => fake()->boolean(20),
        ];
    }
}
