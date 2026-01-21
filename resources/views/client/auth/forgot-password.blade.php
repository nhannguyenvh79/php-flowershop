@extends('layouts.client')

@section('title', ' - Quên mật khẩu')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-800 py-6 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-white">Quên mật khẩu</h1>
            <nav class="text-sm text-gray-500 dark:text-gray-400">
                <ol class="list-none p-0 flex flex-wrap">
                    <li><a href="{{ route('home') }}" class="hover:text-pink-600 dark:hover:text-pink-400">Trang chủ</a>
                    </li>
                    <li class="mx-2">/</li>
                    <li class="text-pink-600 dark:text-pink-400">Quên mật khẩu</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transition-colors duration-300">
            <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Quên mật khẩu</h2>
            <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
                Nhập địa chỉ email của bạn và chúng tôi sẽ gửi liên kết đặt lại mật khẩu qua email.
            </p>

            @if(session('status'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('client.password.email') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Địa chỉ email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500 dark:focus:ring-pink-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-pink-600 hover:bg-pink-700 dark:bg-pink-500 dark:hover:bg-pink-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Gửi liên kết đặt lại mật khẩu
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('client.login') }}" class="text-sm text-pink-600 dark:text-pink-400 hover:text-pink-800 dark:hover:text-pink-300">
                        ← Quay lại trang đăng nhập
                    </a>
                </div>
            </form>

            <div class="mt-6 p-4 bg-pink-50 dark:bg-pink-900 dark:bg-opacity-20 rounded-md">
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-info-circle text-pink-600 mr-2"></i>
                    <strong>Lưu ý:</strong> Tính năng đặt lại mật khẩu tự động đang được phát triển.    Vui lòng <a href="tel:0123456789" class="text-pink-600 dark:text-pink-400 hover:underline font-semibold">gọi 0123 456 789</a> 
                    hoặc <a href="mailto:support@flowershop.com" class="text-pink-600 dark:text-pink-400 hover:underline font-semibold">gửi email</a> 
                    để được hỗ trợ.
                </p>
            </div>

          
        </div>
    </div>
@endsection
