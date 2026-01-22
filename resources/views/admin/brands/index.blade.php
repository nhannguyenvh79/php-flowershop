@extends('layouts.admin')

@section('title', 'Quản lý Thương hiệu')
@section('page-title', 'Quản lý Thương hiệu')

@section('content')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-layer-group mr-3 text-pink-500"></i>Quản Lý Thương Hiệu
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Xem, tìm kiếm và quản lý tất cả các thương hiệu.</p>
                </div>
                <a href="{{ route('admin.brands.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg transition duration-200">
                    <i class="fas fa-plus mr-2"></i>Tạo Thương Hiệu Mới
                </a>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <form method="GET" action="{{ route('admin.brands.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                        <i class="fas fa-search mr-2 text-pink-500"></i>Tìm Kiếm
                    </label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        placeholder="Tên thương hiệu, website..."
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                        <i class="fas fa-toggle-on mr-2 text-pink-500"></i>Trạng Thái
                    </label>
                    <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200">
                        <option value="">Tất cả</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>
                <div></div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg transition duration-200">
                        <i class="fas fa-search mr-2"></i>Tìm Kiếm
                    </button>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.brands.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white font-medium rounded-lg transition duration-200">
                            <i class="fas fa-redo mr-2"></i>Đặt Lại
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-pink-50 to-pink-100 dark:from-pink-900/30 dark:to-pink-800/30 border-b border-gray-200 dark:border-gray-700">
                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            <a href="{{ route('admin.brands.index', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center hover:text-pink-600 dark:hover:text-pink-400">
                                <i class="fas fa-hashtag mr-2 text-pink-500"></i>ID
                                @if(request('sort') == 'id')
                                    <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-image mr-2 text-pink-500"></i>Logo
                        </th>
                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            <a href="{{ route('admin.brands.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center hover:text-pink-600 dark:hover:text-pink-400">
                                <i class="fas fa-heading mr-2 text-pink-500"></i>Tên
                                @if(request('sort') == 'name')
                                    <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-globe mr-2 text-pink-500"></i>Website
                        </th>
                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            <a href="{{ route('admin.brands.index', array_merge(request()->query(), ['sort' => 'is_active', 'direction' => request('sort') == 'is_active' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center hover:text-pink-600 dark:hover:text-pink-400">
                                <i class="fas fa-toggle-on mr-2 text-pink-500"></i>Trạng Thái
                                @if(request('sort') == 'is_active')
                                    <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-4 px-6 text-center text-sm font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-cogs mr-2 text-pink-500"></i>Hành Động
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($brands as $brand)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                            <td class="py-4 px-6 text-sm text-gray-900 dark:text-white font-medium">#{{ $brand->id }}</td>
                            <td class="py-4 px-6">
                                @if($brand->image)
                                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}"
                                        class="h-12 w-12 rounded-lg object-cover border border-gray-200 dark:border-gray-600"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/brands/default.png') }}'; this.classList.add('img-error')">
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-sm"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $brand->name }}</p>
                            </td>
                            <td class="py-4 px-6">
                                @if($brand->website)
                                    <a href="{{ $brand->website }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                        {{ Str::limit($brand->website, 30) }}
                                    </a>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 text-sm">Không có</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($brand->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
                                        <i class="fas fa-check-circle mr-1"></i>Đang Bán
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200">
                                        <i class="fas fa-times-circle mr-1"></i>Tạm Dừng
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.brands.show', $brand->id) }}" 
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-900/50 transition"
                                        title="Xem chi tiết">
                                        <i class="fas fa-eye text-sm"></i>
                                    </a>
                                    <a href="{{ route('admin.brands.edit', $brand->id) }}" 
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-200 dark:hover:bg-amber-900/50 transition"
                                        title="Chỉnh sửa">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form class="inline-block" action="{{ route('admin.brands.destroy', $brand->id) }}"
                                        method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa thương hiệu này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 transition"
                                            title="Xóa">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-6 text-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 dark:text-gray-600 mb-3 block"></i>
                                <p class="text-gray-500 dark:text-gray-400">Không có thương hiệu nào được tìm thấy.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $brands->links() }}
        </div>
    </div>
@endsection