@extends('layouts.admin')

@section('title', 'Thêm khách hàng')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent">
                    <i class="fas fa-user-plus mr-3"></i>Thêm khách hàng mới
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Điền thông tin đầy đủ để tạo khách hàng mới</p>
            </div>
            <a href="{{ route('admin.customers.index') }}"
                class="inline-flex items-center px-6 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-semibold rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i> Quay lại
            </a>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-600 p-4 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 dark:text-red-400 mt-0.5 mr-3 text-lg"></i>
                    <div>
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

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.customers.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Thông Tin Cơ Bản -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-user mr-3 text-blue-500"></i>Thông Tin Cơ Bản
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-user-circle mr-2 text-blue-500"></i>Họ và tên <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    placeholder="Nhập họ và tên đầy đủ"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('name') border-red-500 dark:border-red-400 @enderror">
                                @error('name')
                                    <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-envelope mr-2 text-blue-500"></i>Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    placeholder="example@email.com"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('email') border-red-500 dark:border-red-400 @enderror">
                                @error('email')
                                    <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-phone mr-2 text-blue-500"></i>Số điện thoại
                                </label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                    placeholder="0123456789"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('phone') border-red-500 dark:border-red-400 @enderror">
                                @error('phone')
                                    <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Địa Chỉ -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-purple-500"></i>Địa Chỉ
                        </h2>
                        <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-home mr-2 text-purple-500"></i>Địa chỉ chi tiết
                        </label>
                        <textarea name="address" id="address" rows="4"
                            placeholder="Nhập địa chỉ đầy đủ..."
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('address') border-red-500 dark:border-red-400 @enderror">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mật Khẩu -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-lock mr-3 text-green-500"></i>Mật Khẩu
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-key mr-2 text-green-500"></i>Mật khẩu <span class="text-red-500">*</span>
                                </label>
                                <input type="password" name="password" id="password" required
                                    placeholder="Nhập mật khẩu mạnh"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('password') border-red-500 dark:border-red-400 @enderror">
                                @error('password')
                                    <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-key mr-2 text-green-500"></i>Xác nhận mật khẩu <span class="text-red-500">*</span>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    placeholder="Nhập lại mật khẩu"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md @error('password_confirmation') border-red-500 dark:border-red-400 @enderror">
                                @error('password_confirmation')
                                    <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 justify-end pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.customers.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                            <i class="fas fa-times mr-2"></i> Hủy
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 dark:from-green-600 dark:to-green-700 dark:hover:from-green-700 dark:hover:to-green-800 text-white rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i> Tạo khách hàng
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection