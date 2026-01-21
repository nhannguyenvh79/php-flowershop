@extends('layouts.admin')

@section('title', 'Chỉnh Sửa Thương Hiệu')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-edit mr-3 text-pink-500"></i>Chỉnh Sửa: {{ $brand->name }}
                </h1>
                <a href="{{ route('admin.brands.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Quay Lại
                </a>
            </div>
        </div>

        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Thông Tin Cơ Bản Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-info-circle mr-3 text-purple-500"></i>Thông Tin Cơ Bản
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                            <i class="fas fa-heading mr-2 text-purple-500"></i>Tên Thương Hiệu *
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $brand->name) }}" required
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('name') border-red-500 dark:border-red-400 @enderror">
                        @error('name')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                            <i class="fas fa-align-left mr-2 text-purple-500"></i>Mô Tả
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('description') border-red-500 dark:border-red-400 @enderror resize-none">{{ old('description', $brand->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                            <i class="fas fa-globe mr-2 text-purple-500"></i>Địa Chỉ Website
                        </label>
                        <input type="url" name="website" id="website" value="{{ old('website', $brand->website) }}"
                            placeholder="https://example.com"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('website') border-red-500 dark:border-red-400 @enderror">
                        @error('website')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Hình Ảnh & Cấu Hình Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-image mr-3 text-blue-500"></i>Hình Ảnh & Cấu Hình
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    @if($brand->image)
                        <div>
                            <p class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Hình Ảnh Hiện Tại:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}"
                                    class="h-32 w-32 rounded-lg object-cover border-2 border-gray-200 dark:border-gray-600 shadow-md">
                                <span class="absolute top-2 right-2 bg-green-500 text-white rounded-full p-1">
                                    <i class="fas fa-check text-sm"></i>
                                </span>
                            </div>
                        </div>
                    @endif
                    
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                            <i class="fas fa-upload mr-2 text-blue-500"></i>Cập Nhật Hình Ảnh Logo
                        </label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-300 dark:hover:file:bg-gray-500 @error('image') border-red-500 dark:border-red-400 @enderror">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Để trống để giữ hình ảnh hiện tại | Định dạng: JPG, PNG, GIF (Max 5MB)</p>
                        @error('image')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $brand->is_active) ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-white border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:checked:bg-blue-600 cursor-pointer">
                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300 cursor-pointer flex items-center">
                            <i class="fas fa-toggle-on mr-2 text-blue-500"></i>Kích Hoạt Thương Hiệu
                        </label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 justify-end">
                <a href="{{ route('admin.brands.index') }}"
                    class="inline-flex items-center px-6 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium rounded-lg transition duration-200">
                    <i class="fas fa-times mr-2"></i>Hủy
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white font-medium rounded-lg shadow-lg shadow-amber-500/50 transition duration-200">
                    <i class="fas fa-save mr-2"></i>Cập Nhật
                </button>
            </div>
        </form>
    </div>
@endsection