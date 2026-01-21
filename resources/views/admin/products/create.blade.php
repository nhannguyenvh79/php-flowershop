@extends('layouts.admin')

@section('title', ' - Thêm sản phẩm mới')
@section('page-title', 'Thêm sản phẩm mới')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-plus text-teal-500 mr-3"></i>Thêm sản phẩm mới
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Tạo sản phẩm mới cho cửa hàng hoa của bạn</p>
            </div>
            <a href="{{ route('admin.products.index') }}"
                class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Quay lại
            </a>
        </div>

        <!-- Form Card -->
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <h3 class="text-red-800 dark:text-red-200 font-semibold">Có lỗi xảy ra:</h3>
                    </div>
                    <ul class="text-red-700 dark:text-red-300 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-circle text-red-500 mr-2" style="font-size: 4px;"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Thông tin cơ bản -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="bg-gradient-to-r from-teal-50 to-cyan-50 dark:from-teal-900/30 dark:to-cyan-900/30 px-6 py-4">
                    <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                        <i class="fas fa-info-circle text-teal-500 mr-3"></i>Thông tin cơ bản
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <!-- Tên sản phẩm -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tag text-teal-500 mr-2"></i>Tên sản phẩm <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('name') !border-red-500 dark:!border-red-500 @enderror" 
                            id="name" name="name" value="{{ old('name') }}" required placeholder="Nhập tên sản phẩm">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Danh mục & Thương hiệu -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-folder text-teal-500 mr-2"></i>Danh mục <span class="text-red-500">*</span>
                            </label>
                            <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('category_id') !border-red-500 dark:!border-red-500 @enderror" 
                                id="category_id" name="category_id" required>
                                <option value="">-- Chọn danh mục --</option>
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="brand_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-trademark text-teal-500 mr-2"></i>Thương hiệu
                            </label>
                            <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('brand_id') !border-red-500 dark:!border-red-500 @enderror" 
                                id="brand_id" name="brand_id">
                                <option value="">-- Chọn thương hiệu --</option>
                                @if(isset($brands))
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('brand_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Mô tả -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-align-left text-teal-500 mr-2"></i>Mô tả <span class="text-red-500">*</span>
                        </label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('description') !border-red-500 dark:!border-red-500 @enderror" 
                            id="description" name="description" rows="4" required placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Giá & Tồn kho -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 px-6 py-4">
                    <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                        <i class="fas fa-dollar-sign text-green-500 mr-3"></i>Giá & Tồn kho
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Giá gốc -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-price-tag text-green-500 mr-2"></i>Giá gốc <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500 dark:text-gray-400">₫</span>
                                <input type="number" step="0.01" 
                                    class="w-full pl-8 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('price') !border-red-500 dark:!border-red-500 @enderror"
                                    id="price" name="price" value="{{ old('price') }}" required placeholder="0">
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Giá khuyến mãi -->
                        <div>
                            <label for="sale_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-percent text-green-500 mr-2"></i>Giá khuyến mãi
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500 dark:text-gray-400">₫</span>
                                <input type="number" step="0.01"
                                    class="w-full pl-8 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('sale_price') !border-red-500 dark:!border-red-500 @enderror"
                                    id="sale_price" name="sale_price" value="{{ old('sale_price') }}" placeholder="0">
                            </div>
                            @error('sale_price')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Tồn kho -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-boxes text-green-500 mr-2"></i>Tồn kho <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('stock') !border-red-500 dark:!border-red-500 @enderror"
                                id="stock" name="stock" value="{{ old('stock') }}" required placeholder="0">
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ảnh sản phẩm -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/30 dark:to-pink-900/30 px-6 py-4">
                    <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                        <i class="fas fa-image text-purple-500 mr-3"></i>Ảnh sản phẩm
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-upload text-purple-500 mr-2"></i>Chọn ảnh sản phẩm
                        </label>
                        <input type="file" 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('image') !border-red-500 dark:!border-red-500 @enderror"
                            id="image" name="image" accept="image/*">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">JPG, PNG, GIF (Tối đa 2MB)</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Trạng thái -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-indigo-900/30 dark:to-blue-900/30 px-6 py-4">
                    <h2 class="text-lg font-semibold flex items-center text-gray-900 dark:text-white">
                        <i class="fas fa-toggle-on text-indigo-500 mr-3"></i>Trạng thái
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div>
                                <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-eye text-indigo-500 mr-2"></i>Hiển thị sản phẩm
                                </label>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Cho phép hiển thị sản phẩm trong cửa hàng</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="is_active" name="is_active" value="1" 
                                    {{ old('is_active', true) ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div>
                                <label for="is_featured" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-star text-indigo-500 mr-2"></i>Sản phẩm nổi bật
                                </label>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Hiển thị trong danh sách nổi bật</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="is_featured" name="is_featured" value="1" 
                                    {{ old('is_featured') ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-6">
                <button type="submit" 
                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <i class="fas fa-plus mr-2"></i>
                    Tạo sản phẩm
                </button>
                <a href="{{ route('admin.products.index') }}" 
                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <i class="fas fa-times mr-2"></i>
                    Hủy
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('image-preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'image-preview';
                    preview.className = 'mt-4';
                    document.getElementById('image').parentNode.appendChild(preview);
                }
                
                preview.innerHTML = `
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Xem trước:</p>
                    <div class="relative group">
                        <img src="${e.target.result}" alt="Preview" 
                            class="w-full h-48 object-cover rounded-lg border-2 border-teal-200 dark:border-teal-700 shadow-sm">
                        <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <span class="text-white text-sm font-semibold">Ảnh mới</span>
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const price = parseFloat(document.getElementById('price').value);
        const salePrice = parseFloat(document.getElementById('sale_price').value);
        
        if (salePrice && salePrice >= price) {
            e.preventDefault();
            alert('Giá khuyến mãi phải nhỏ hơn giá gốc!');
            return false;
        }
    });
</script>
@endsection
