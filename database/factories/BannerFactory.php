<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bannerTitles = [
            'Khuyến Mãi Hoa Tươi',
            'Hoa Tươi Cao Cấp',
            'Bó Hoa Rực Rỡ',
            'Ưu Đãi Đặc Biệt',
            'Hoa Tươi Mỗi Ngày',
            'Giảm Giá Lên Đến 50%',
            'Bó Hoa Sinh Nhật',
            'Trang Trí Tiệc Cưới'
        ];
        
        return [
            'title' => fake()->randomElement($bannerTitles),
            'description' => fake()->sentence(),
            'image' => 'banners/banner-' . fake()->numberBetween(1, 5) . '.jpg',
            'link' => fake()->randomElement(['https://www.lazada.vn/', 'https://shopee.vn/', 'https://www.tiki.vn/', '#']),
            'is_active' => fake()->boolean(80),
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
