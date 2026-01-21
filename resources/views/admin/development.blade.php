@extends('layouts.admin')

@section('title', ' - Đang phát triển')
@section('page-title', 'Đang phát triển')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full text-center space-y-6">
            <!-- Icon -->
            <div class="flex justify-center mb-8">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-lg opacity-50"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-full p-8">
                        <i class="fas fa-tools text-6xl text-gradient bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"></i>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    Đang phát triển
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    Tính năng này đang được phát triển
                </p>
            </div>

            <!-- Description -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <p class="text-gray-700 dark:text-gray-300">
                    Chúng tôi đang làm việc cứng cỏi để đưa tính năng này đến cho bạn. Vui lòng quay lại sau!
                </p>
            </div>

            <!-- Progress -->
            <div class="space-y-2">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Tiến độ phát triển</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 h-2 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 text-right">65% hoàn thành</p>
            </div>

            <!-- Features Coming Soon -->
            <div class="text-left bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <p class="text-sm font-semibold text-gray-900 dark:text-white mb-3">
                    <i class="fas fa-star mr-2 text-yellow-500"></i>Sắp ra mắt
                </p>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Cấu hình cài đặt hệ thống
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Quản lý tích hợp bên thứ ba
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Tối ưu hóa hiệu suất
                    </li>
                </ul>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-medium rounded-lg transition-all duration-200">
                    <i class="fas fa-home mr-2"></i>
                    Trang chủ
                </a>
                <a href="javascript:history.back()" 
                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Quay lại
                </a>
            </div>

            <!-- Footer Text -->
            <p class="text-xs text-gray-500 dark:text-gray-500">
                Cập nhật lần cuối: {{ now()->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>

    <style>
        .text-gradient {
            background: linear-gradient(135deg, #0066ff, #aa00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
@endsection
