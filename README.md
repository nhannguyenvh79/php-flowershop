# PHP Flowershop 🌸

## Yêu cầu hệ thống

- PHP 8.2 trở lên
- Composer
- Node.js & npm
- Cơ sở dữ liệu MySQL (XAMPP)
- Git

## Các bước cài đặt

### 1. Trỏ vào thư mục php-flowershop

```bash
cd php-flowershop
```

### 2. Cài đặt PHP Dependencies

```bash
composer install
```

### 3. Cài đặt Node.js Dependencies

```bash
npm install
```

### 4. Cấu hình môi trường

Sao chép file môi trường mẫu và cấu hình:

```bash
copy .env.example .env
```

Chỉnh sửa file `.env` và cấu hình cài đặt cơ sở dữ liệu của bạn:

```env
# Cho MySQL (khuyến nghị cho production)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flowershop
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Tạo Application Key

```bash
php artisan key:generate
```

Hoặc thiết lập thủ công `APP_KEY` trong file `.env` của bạn.

```env
APP_KEY=base64:your_generated_key_here
```

### 6. Thiết lập cơ sở dữ liệu

1. Tạo cơ sở dữ liệu MySQL với tên `flowershop` trong XAMPP (phpMyAdmin)
2. Cập nhật file `.env` với thông tin đăng nhập MySQL
3. Chạy migrations và seeders:

```bash
php artisan migrate --seed
```

### 7. Tạo Storage Link (sử dụng hình ảnh local)

```bash
php artisan storage:link
```

## Chạy ứng dụng

#### Khởi động Laravel Server

```bash
php artisan serve
```

#### Khởi động Vite Development Server (trong terminal khác)

```bash
npm run dev
```

Ứng dụng sẽ có sẵn tại: `http://localhost:8000`

## Tài khoản mặc định

Sau khi chạy seeders, bạn có thể đăng nhập với các tài khoản mặc định sau:

### Tài khoản Admin

- **Email**: admin@example.com
- **Tên đăng nhập**: admin
- **Mật khẩu**: password
- **Vai trò**: admin

### Tài khoản người dùng thường

- **Email**: user@example.com
- **Tên đăng nhập**: user
- **Mật khẩu**: password
- **Vai trò**: user

## Các lệnh Artisan có sẵn (nếu gặp các vấn đề về config và cache)

```bash
# Xóa cache ứng dụng
php artisan cache:clear

# Xóa cache cấu hình
php artisan config:clear
```

## Cấu trúc thư mục

```
app/
├── Models/           # Các model Eloquent
├── Http/
│   ├── Controllers/  # Các controller của ứng dụng
│   └── Middleware/   # Middleware tùy chỉnh
database/
├── migrations/       # Các migration cơ sở dữ liệu
├── factories/        # Factory model cho kiểm thử
└── seeders/         # Các seeder cơ sở dữ liệu
resources/
├── views/           # Các template Blade
├── css/             # Stylesheets
└── js/              # Các file JavaScript
routes/
└── web.php          # Các route web
```

## Công nghệ sử dụng

- **Backend**: Laravel 12.x, PHP 8.2+
- **Frontend**: Vite, TailwindCSS, JavaScript
- **Cơ sở dữ liệu**: MySQL/SQLite
- **Kiểm thử**: PHPUnit
- **Quản lý gói**: Composer, npm
