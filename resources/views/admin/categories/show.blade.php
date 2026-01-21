@extends('layouts.admin')

@section('title', 'Chi tiết danh mục')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-folder-open mr-3 text-purple-500"></i>{{ $category->name }}
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">ID: <span class="font-semibold">#{{ $category->id }}</span></p>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition duration-200">
                        <i class="fas fa-edit mr-2"></i> Chỉnh Sửa
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Quay Lại
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-info-circle mr-3 text-purple-500"></i>Thông Tin Cơ Bản
                        </h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                    <i class="fas fa-heading mr-2 text-purple-500"></i>Tên Danh Mục
                                </p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $category->name }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                    <i class="fas fa-list-ol mr-2 text-purple-500"></i>Thứ Tự Hiển Thị
                                </p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $category->sort_order }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <i class="fas fa-align-left mr-2 text-purple-500"></i>Mô Tả
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $category->description ?: 'Chưa có mô tả' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                    <i class="fas fa-calendar-alt mr-2 text-purple-500"></i>Ngày Tạo
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $category->created_at->format('d/m/Y') }}<br>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $category->created_at->format('H:i') }}</span>
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                    <i class="fas fa-sync-alt mr-2 text-purple-500"></i>Cập Nhật
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $category->updated_at->format('d/m/Y') }}<br>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $category->updated_at->format('H:i') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products List Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-box mr-3 text-blue-500"></i>Sản Phẩm ({{ $category->products->count() }})
                        </h2>
                    </div>
                    <div class="overflow-x-auto">
                        @if($category->products->count() > 0)
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-box mr-2 text-blue-500"></i>Tên Sản Phẩm
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-image mr-2 text-blue-500"></i>Hình
                                        </th>
                                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-tag mr-2 text-blue-500"></i>Giá
                                        </th>
                                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-toggle-on mr-2 text-blue-500"></i>Trạng Thái
                                        </th>
                                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-cogs mr-2 text-blue-500"></i>Hành Động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($category->products as $product)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                            <td class="px-6 py-4">
                                                <div class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">ID: #{{ $product->id }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                        class="h-10 w-10 rounded-lg object-cover border border-gray-200 dark:border-gray-600">
                                                @else
                                                    <div class="h-10 w-10 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                        <i class="fas fa-image text-gray-400 text-sm"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <span class="font-semibold text-gray-900 dark:text-white">
                                                    {{ number_format($product->price, 0, ',', '.') }}₫
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if($product->is_active)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
                                                        <i class="fas fa-check-circle mr-1"></i>Đang Bán
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200">
                                                        <i class="fas fa-times-circle mr-1"></i>Ngưng Bán
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-900/50 transition"
                                                        title="Xem chi tiết">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </a>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-200 dark:hover:bg-amber-900/50 transition"
                                                        title="Chỉnh sửa">
                                                        <i class="fas fa-edit text-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-12 text-center">
                                <i class="fas fa-inbox text-4xl text-gray-400 dark:text-gray-600 mb-3 block"></i>
                                <p class="text-gray-500 dark:text-gray-400">Chưa có sản phẩm trong danh mục này</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Image Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 dark:from-indigo-900/30 dark:to-indigo-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-image mr-3 text-indigo-500"></i>Hình Ảnh
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                class="w-full rounded-lg object-cover border border-gray-200 dark:border-gray-600 shadow-md">
                        @else
                            <div class="w-full h-64 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-image text-5xl text-gray-400 dark:text-gray-600 mb-2 block"></i>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Không có hình ảnh</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mt-6">
                    <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-toggle-on mr-3 text-green-500"></i>Trạng Thái
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($category->is_active)
                            <div class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                                <i class="fas fa-check-circle text-2xl text-green-500 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-green-800 dark:text-green-200">Đang Hoạt Động</p>
                                    <p class="text-xs text-green-700 dark:text-green-300">Danh mục này đang được hiển thị</p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center p-4 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-200 dark:border-red-800">
                                <i class="fas fa-times-circle text-2xl text-red-500 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-red-800 dark:text-red-200">Ngưng Hoạt Động</p>
                                    <p class="text-xs text-red-700 dark:text-red-300">Danh mục này đã ẩn</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mt-6">
                    <div class="bg-gradient-to-r from-orange-50 to-orange-100 dark:from-orange-900/30 dark:to-orange-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-chart-bar mr-3 text-orange-500"></i>Thống Kê
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Tổng Sản Phẩm</span>
                            <span class="text-2xl font-bold text-orange-600 dark:text-orange-400">{{ $category->products->count() }}</span>
                        </div>
                        <hr class="border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Sản Phẩm Đang Bán</span>
                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $category->products->where('is_active', true)->count() }}</span>
                        </div>
                        <hr class="border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Sản Phẩm Ngưng Bán</span>
                            <span class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $category->products->where('is_active', false)->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
