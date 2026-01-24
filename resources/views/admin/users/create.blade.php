@extends('layouts.admin')

@section('title', ' - Thêm người dùng')
@section('page-title', 'Thêm người dùng')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-12">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                    <i class="fas fa-user-plus text-green-500"></i>
                    Thêm Người Dùng Mới
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Tạo một tài khoản người dùng mới cho hệ thống</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center px-5 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i> Quay lại
            </a>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-600 p-4 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 dark:text-red-400 mt-1 mr-3 flex-shrink-0"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-red-800 dark:text-red-200 mb-2">Có lỗi xảy ra:</h3>
                        <ul class="list-disc list-inside text-red-700 dark:text-red-300 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Form Header with Icon -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/30 dark:to-blue-900/30 px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-lg bg-green-500 flex items-center justify-center text-white text-xl">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Thông Tin Tài Khoản</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Điền thông tin đăng nhập cho người dùng mới</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="p-8">
                @csrf
                <div class="space-y-8">
                    <!-- Account Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-user text-blue-500"></i>
                                Họ và Tên <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                                placeholder="Ví dụ: Nguyễn Văn A"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('name') border-red-500 ring-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-envelope text-blue-500"></i>
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                placeholder="ví dụ@email.com"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('email') border-red-500 ring-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-at text-blue-500"></i>
                                Tên Đăng Nhập <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}" required
                                placeholder="user123"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('username') border-red-500 ring-red-500 @enderror">
                            @error('username')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-shield-alt text-purple-500"></i>
                                Vai Trò <span class="text-red-500">*</span>
                            </label>
                            <select name="role" id="role" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('role') border-red-500 ring-red-500 @enderror">
                                <option value="">Chọn vai trò</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>👤 Người dùng</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Quản trị viên</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-lock text-green-500"></i>
                                Mật Khẩu <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password" id="password" required autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('password') border-red-500 ring-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-check-double text-green-500"></i>
                                Xác Nhận Mật Khẩu <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                placeholder="••••••••"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500">
                        </div>
                    </div>

                    <!-- Password Tips -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-blue-500 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-blue-900 dark:text-blue-200 mb-1">💡 Mẹo Mật Khẩu Mạnh</h4>
                                <ul class="text-sm text-blue-800 dark:text-blue-300 space-y-1">
                                    <li>✓ Sử dụng ít nhất 8 ký tự</li>
                                    <li>✓ Kết hợp chữ hoa, chữ thường, số và ký tự đặc biệt</li>
                                    <li>✓ Tránh sử dụng thông tin cá nhân dễ đoán</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 justify-end mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition font-medium">
                        <i class="fas fa-times mr-2"></i> Hủy
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 dark:from-green-600 dark:to-blue-600 dark:hover:from-green-700 dark:hover:to-blue-700 text-white rounded-lg transition font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fas fa-plus mr-2"></i> Tạo Người Dùng
                    </button>
                </div>
            </form>
        </div>
    </div>
            </form>
        </div>
    </div>
@endsection