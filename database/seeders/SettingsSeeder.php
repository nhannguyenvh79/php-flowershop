<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General settings
            [
                'key' => 'site_name',
                'value' => 'Flora Garden',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Tên website',
                'status' => 'enabled',
            ],
            [
                'key' => 'site_description',
                'value' => 'Cửa hàng hoa tươi đẹp nhất',
                'group' => 'general',
                'type' => 'textarea',
                'label' => 'Mô tả website',
                'status' => 'enabled',
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'group' => 'general',
                'type' => 'boolean',
                'label' => 'Chế độ bảo trì',
                'status' => 'enabled',
            ],
            [
                'key' => 'allow_registration',
                'value' => '1',
                'group' => 'general',
                'type' => 'boolean',
                'label' => 'Cho phép đăng ký',
                'status' => 'enabled',
            ],
            [
                'key' => 'items_per_page',
                'value' => '12',
                'group' => 'general',
                'type' => 'number',
                'label' => 'Số sản phẩm mỗi trang',
                'status' => 'enabled',
            ],

            // Contact settings
            [
                'key' => 'contact_email',
                'value' => 'contact@flowershop.vn',
                'group' => 'contact',
                'type' => 'email',
                'label' => 'Email liên hệ',
                'status' => 'enabled',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+84 (0)28 3823 0123',
                'group' => 'contact',
                'type' => 'text',
                'label' => 'Số điện thoại',
                'status' => 'enabled',
            ],
            [
                'key' => 'address',
                'value' => '254 Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh',
                'group' => 'contact',
                'type' => 'textarea',
                'label' => 'Địa chỉ',
                'status' => 'enabled',
            ],

            // Social media settings
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/flowershopvn',
                'group' => 'social',
                'type' => 'url',
                'label' => 'Facebook URL',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tích hợp API Facebook',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/flowershopvn',
                'group' => 'social',
                'type' => 'url',
                'label' => 'Instagram URL',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tích hợp API Instagram',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/flowershopvn',
                'group' => 'social',
                'type' => 'url',
                'label' => 'Twitter URL',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tích hợp API Twitter',
            ],

            // Appearance settings
            [
                'key' => 'dark_mode_default',
                'value' => '0',
                'group' => 'appearance',
                'type' => 'boolean',
                'label' => 'Chế độ tối mặc định',
                'status' => 'enabled',
            ],
            [
                'key' => 'primary_color',
                'value' => '#ec4899',
                'group' => 'appearance',
                'type' => 'color',
                'label' => 'Màu chính',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tùy chỉnh màu sắc theme',
            ],

            // Store settings
            [
                'key' => 'currency',
                'value' => 'VND',
                'group' => 'store',
                'type' => 'select',
                'label' => 'Đơn vị tiền tệ',
                'status' => 'enabled',
                'options' => json_encode(['VND' => 'VND', 'USD' => 'USD', 'EUR' => 'EUR']),
            ],
            [
                'key' => 'timezone',
                'value' => 'Asia/Ho_Chi_Minh',
                'group' => 'store',
                'type' => 'select',
                'label' => 'Múi giờ',
                'status' => 'enabled',
                'options' => json_encode([
                    'Asia/Ho_Chi_Minh' => 'Việt Nam (UTC+7)',
                    'Asia/Singapore' => 'Singapore (UTC+8)',
                    'Asia/Tokyo' => 'Tokyo (UTC+9)',
                    'UTC' => 'UTC',
                ]),
            ],

            // Email settings (Development)
            [
                'key' => 'email_provider',
                'value' => 'smtp',
                'group' => 'email',
                'type' => 'select',
                'label' => 'Nhà cung cấp email',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - cấu hình SMTP/Mailgun/SendGrid',
                'options' => json_encode(['smtp' => 'SMTP', 'mailgun' => 'Mailgun', 'sendgrid' => 'SendGrid']),
            ],
            [
                'key' => 'smtp_host',
                'value' => 'smtp.gmail.com',
                'group' => 'email',
                'type' => 'text',
                'label' => 'SMTP Host',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - cấu hình SMTP',
            ],
            [
                'key' => 'smtp_port',
                'value' => '587',
                'group' => 'email',
                'type' => 'number',
                'label' => 'SMTP Port',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - cấu hình SMTP',
            ],

            // Payment settings (Development)
            [
                'key' => 'enable_paypal',
                'value' => '0',
                'group' => 'payment',
                'type' => 'boolean',
                'label' => 'Bật PayPal',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tích hợp PayPal',
            ],
            [
                'key' => 'enable_stripe',
                'value' => '0',
                'group' => 'payment',
                'type' => 'boolean',
                'label' => 'Bật Stripe',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tích hợp Stripe',
            ],
            [
                'key' => 'enable_bank_transfer',
                'value' => '1',
                'group' => 'payment',
                'type' => 'boolean',
                'label' => 'Bật chuyển khoản ngân hàng',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển',
            ],
            [
                'key' => 'enable_cod',
                'value' => '1',
                'group' => 'payment',
                'type' => 'boolean',
                'label' => 'Bật thanh toán khi nhận hàng',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển',
            ],

            // Shipping settings (Development)
            [
                'key' => 'enable_shipping_calculator',
                'value' => '0',
                'group' => 'shipping',
                'type' => 'boolean',
                'label' => 'Bật tính toán phí vận chuyển',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tính toán phí vận chuyển tự động',
            ],
            [
                'key' => 'flat_shipping_fee',
                'value' => '30000',
                'group' => 'shipping',
                'type' => 'number',
                'label' => 'Phí vận chuyển cố định (VND)',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển',
            ],

            // SEO settings (Development)
            [
                'key' => 'enable_seo',
                'value' => '0',
                'group' => 'seo',
                'type' => 'boolean',
                'label' => 'Bật tối ưu SEO',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - tối ưu hóa công cụ tìm kiếm',
            ],
            [
                'key' => 'meta_description',
                'value' => 'Cửa hàng hoa tươi trực tuyến',
                'group' => 'seo',
                'type' => 'textarea',
                'label' => 'Meta Description',
                'status' => 'disabled',
                'notes' => 'Tính năng đang phát triển - cấu hình meta tags',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
