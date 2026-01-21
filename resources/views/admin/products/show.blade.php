@extends('layouts.admin')

@section('title', ' - Chi tiết sản phẩm')
@section('page-title', 'Chi tiết sản phẩm')

@section('content')
    <div class="space-y-6">
        <!-- Header with Icon -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-box text-teal-500 mr-3"></i>{{ $product->name }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Chi tiết đầy đủ về sản phẩm</p>
            </div>
            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('admin.products.edit', $product) }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Chỉnh sửa
                </a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                        <i class="fas fa-trash mr-2"></i>
                        Xóa
                    </button>
                </form>
                <a href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Quay lại
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Thông tin cơ bản -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-teal-50 to-cyan-50 dark:from-teal-900/30 dark:to-cyan-900/30 px-6 py-4">
                        <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-info-circle text-teal-500 mr-3"></i>Thông tin cơ bản
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-hashtag text-teal-500 mr-2"></i>Mã sản phẩm
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">#{{ $product->id }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-barcode text-teal-500 mr-2"></i>SKU
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->sku ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-folder text-teal-500 mr-2"></i>Danh mục
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->category->name ?? 'Chưa phân loại' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-trademark text-teal-500 mr-2"></i>Thương hiệu
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->brand->name ?? 'Không có' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mô tả -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30 px-6 py-4">
                        <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-align-left text-blue-500 mr-3"></i>Mô tả sản phẩm
                        </h2>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Giá & Tồn kho -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 px-6 py-4">
                        <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-dollar-sign text-green-500 mr-3"></i>Giá & Tồn kho
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-green-600 dark:text-green-400 mb-2">
                                    <i class="fas fa-price-tag mr-1"></i>Giá bán
                                </label>
                                <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                            </div>
                            @if($product->sale_price)
                                <div class="bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-orange-600 dark:text-orange-400 mb-2">
                                        <i class="fas fa-percent mr-1"></i>Giá khuyến mãi
                                    </label>
                                    <p class="text-2xl font-bold text-orange-700 dark:text-orange-300">{{ number_format($product->sale_price, 0, ',', '.') }}₫</p>
                                </div>
                            @endif
                            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-blue-600 dark:text-blue-400 mb-2">
                                    <i class="fas fa-boxes mr-1"></i>Tồn kho
                                </label>
                                <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ number_format($product->stock, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trạng thái -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 px-6 py-4">
                        <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-toggle-on text-indigo-500 mr-3"></i>Trạng thái
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <span class="text-gray-700 dark:text-gray-300 font-medium">
                                    <i class="fas fa-eye text-indigo-500 mr-2"></i>Hiển thị
                                </span>
                                @if($product->is_active)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Đang hiển thị
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Đã ẩn
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <span class="text-gray-700 dark:text-gray-300 font-medium">
                                    <i class="fas fa-star text-indigo-500 mr-2"></i>Nổi bật
                                </span>
                                @if($product->is_featured)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        <i class="fas fa-star mr-1"></i>
                                        Nổi bật
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-400">
                                        <i class="fas fa-star-o mr-1"></i>
                                        Thường
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông tin khác -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-900/30 dark:to-slate-900/30 px-6 py-4">
                        <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-clock text-gray-500 mr-3"></i>Thông tin khác
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-calendar text-gray-500 mr-2"></i>Ngày tạo
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fas fa-sync-alt text-gray-500 mr-2"></i>Cập nhật lần cuối
                                </label>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Hình ảnh sản phẩm -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/30 dark:to-pink-900/30 px-6 py-4">
                        <h3 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                            <i class="fas fa-image text-purple-500 mr-3"></i>Hình ảnh
                        </h3>
                    </div>
                    <div class="p-4">
                        @if($product->image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-64 object-cover rounded-lg border border-gray-200 dark:border-gray-600 shadow-sm group-hover:shadow-lg transition-shadow duration-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-lg transition-all duration-200 flex items-center justify-center">
                                    <i class="fas fa-search-plus text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-200"></i>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 text-center mt-2">{{ $product->image }}</p>
                        @else
                            <div class="w-full h-64 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center">
                                <div class="text-center text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-image text-5xl mb-3"></i>
                                    <p class="text-sm font-medium">Không có hình ảnh</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Info Card -->
                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg shadow-sm p-6 text-white">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="font-medium opacity-90">Tồn kho:</span>
                            <span class="text-lg font-bold">{{ $product->stock }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium opacity-90">Giá bán:</span>
                            <span class="text-lg font-bold">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                        </div>
                        @if($product->sale_price)
                        <div class="flex items-center justify-between">
                            <span class="font-medium opacity-90">Khuyến mãi:</span>
                            <span class="text-lg font-bold">{{ number_format($product->sale_price, 0, ',', '.') }}₫</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
