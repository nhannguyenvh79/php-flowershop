<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Cách chăm sóc hoa hồng tại nhà',
            'Top 10 loại hoa đẹp nhất',
            'Ý nghĩa của màu sắc hoa',
            'Cách giữ hoa tươi lâu hơn',
            'Xu hướng cắm hoa hiện đại',
            'Hoa tươi cho các dịp đặc biệt',
            'Lợi ích sức khỏe từ hoa tươi',
            'Cách lựa chọn hoa phù hợp',
            'Bí quyết cắm hoa đẹp',
            'Hoa theo mùa và ý nghĩa',
        ];

        return [
            'title' => fake()->randomElement($titles),
            'content' => fake()->paragraphs(5, true),
            'image' => 'blog/blog-' . fake()->numberBetween(1, 10) . '.jpg',
            'is_active' => fake()->boolean(80),
        ];
    }
}
