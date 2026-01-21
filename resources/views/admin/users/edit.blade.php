@extends('layouts.admin')

@section('title', 'Chỉnh sửa người dùng')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-12">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                    <i class="fas fa-user-cog text-blue-500"></i>
                    Chỉnh Sửa Người Dùng
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <i class="fas fa-user-circle mr-1"></i> {{ $user->name }} 
                    <span class="mx-2">•</span>
                    <i class="fas fa-envelope mr-1"></i> {{ $user->email }}
                </p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center px-5 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i> Quay lại
            </a>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-600 p-4 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 dark:text-red-400 mt-0.5 mr-3 flex-shrink-0"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-red-800 dark:text-red-200 mb-2">Có lỗi xảy ra:</h3>
                        <ul class="list-disc list-inside text-red-700 dark:text-red-300 text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Thông Tin Tài Khoản -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center text-white text-sm">
                                <i class="fas fa-lock"></i>
                            </div>
                            Thông Tin Tài Khoản
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-user text-blue-500"></i>Họ và Tên <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('name') border-red-500 ring-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-at text-blue-500"></i>Tên Đăng Nhập <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('username') border-red-500 ring-red-500 @enderror">
                                @error('username')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-envelope text-blue-500"></i>Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('email') border-red-500 ring-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-shield-alt text-purple-500"></i>Vai Trò <span class="text-red-500">*</span>
                                </label>
                                <select name="role" id="role" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('role') border-red-500 ring-red-500 @enderror">
                                    <option value="">Chọn vai trò</option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>👤 Người dùng</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>👑 Quản trị viên</option>
                                </select>
                                @error('role')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông Tin Cá Nhân -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-purple-500 flex items-center justify-center text-white text-sm">
                                <i class="fas fa-address-card"></i>
                            </div>
                            Thông Tin Cá Nhân
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-phone text-purple-500"></i>Số Điện Thoại
                                </label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                    placeholder="0123456789"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:focus:ring-purple-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('phone') border-red-500 ring-red-500 @enderror"
                                    placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-city text-purple-500"></i>Thành Phố
                                </label>
                                <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}"
                                    placeholder="TP. Hồ Chí Minh"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:focus:ring-purple-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('city') border-red-500 ring-red-500 @enderror">
                                @error('city')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="state" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-map text-purple-500"></i>Tỉnh/Quốc Gia
                                </label>
                                <input type="text" name="state" id="state" value="{{ old('state', $user->state) }}"
                                    placeholder="Việt Nam"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:focus:ring-purple-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('state') border-red-500 ring-red-500 @enderror">
                                @error('state')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="zip_code" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-envelope-open text-purple-500"></i>Mã Bưu Chính
                                </label>
                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $user->zip_code) }}"
                                    placeholder="700000"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:focus:ring-purple-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('zip_code') border-red-500 ring-red-500 @enderror">
                                @error('zip_code')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <i class="fas fa-home text-purple-500"></i>Địa Chỉ Chi Tiết
                            </label>
                            <textarea name="address" id="address" rows="3"
                                placeholder="Nhập địa chỉ đầy đủ..."
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:focus:ring-purple-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('address') border-red-500 ring-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Bảo Mật -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-green-500 flex items-center justify-center text-white text-sm">
                                <i class="fas fa-key"></i>
                            </div>
                            Bảo Mật
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-3 mb-4">
                            <p class="text-sm text-blue-800 dark:text-blue-300 flex items-start gap-2">
                                <i class="fas fa-info-circle mt-0.5 flex-shrink-0"></i>
                                Để trống nếu không muốn thay đổi mật khẩu
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-lock text-green-500"></i>Mật Khẩu Mới
                                </label>
                                <input type="password" name="password" id="password"
                                    placeholder="••••••••"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:focus:ring-green-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 @error('password') border-red-500 ring-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1"><i class="fas fa-info-circle"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <i class="fas fa-check-double text-green-500"></i>Xác Nhận Mật Khẩu
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:focus:ring-green-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex gap-4 justify-end pt-8 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition font-medium">
                    <i class="fas fa-times mr-2"></i> Hủy
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 dark:from-blue-600 dark:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 text-white rounded-lg transition font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i> Cập Nhật Người Dùng
                </button>
            </div>
        </form>
    </div>
@endsection