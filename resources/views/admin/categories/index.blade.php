@extends('layouts.admin')

@section('title', 'Quản lý Danh mục')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-list mr-3 text-purple-500"></i>Danh Mục Sản Phẩm
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Quản lý {{ $categories->total() }} danh mục</p>
                </div>
                <a href="{{ route('admin.categories.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 dark:from-purple-600 dark:to-purple-700 dark:hover:from-purple-700 dark:hover:to-purple-800 text-white font-semibold rounded-lg transition duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus mr-2"></i>Tạo Danh Mục
                </a>
            </div>
        </div>

        <!-- Search & Filter Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <form method="GET" action="{{ route('admin.categories.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2 text-purple-500"></i>Tìm kiếm
                        </label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            placeholder="Tên danh mục..."
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 transition">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-filter mr-2 text-purple-500"></i>Trạng thái
                        </label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 transition">
                            <option value="">Tất cả</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>✓ Hoạt động</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>✕ Tạm dừng</option>
                        </select>
                    </div>
                    <div class="flex items-end gap-2">
                        <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 hover:bg-purple-700 dark:bg-purple-700 dark:hover:bg-purple-800 text-white font-medium rounded-lg transition">
                            <i class="fas fa-search mr-2"></i>Tìm
                        </button>
                        @if(request('search') || request('status'))
                            <a href="{{ route('admin.categories.index') }}" class="flex-1 px-4 py-2 bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 text-white font-medium rounded-lg transition text-center">
                                <i class="fas fa-times mr-2"></i>Xóa
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Categories Table Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left">
                                <a href="{{ route('admin.categories.index', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                    class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 flex items-center gap-2">
                                    <i class="fas fa-hashtag w-4"></i>ID
                                    @if(request('sort') == 'id')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} text-purple-500"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-image mr-2 text-purple-500"></i>Hình Ảnh
                            </th>
                            <th class="px-6 py-4 text-left">
                                <a href="{{ route('admin.categories.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                    class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 flex items-center gap-2">
                                    <i class="fas fa-heading w-4"></i>Tên
                                    @if(request('sort') == 'name')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} text-purple-500"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-align-left mr-2 text-purple-500"></i>Mô Tả
                            </th>
                            <th class="px-6 py-4 text-left">
                                <a href="{{ route('admin.categories.index', array_merge(request()->query(), ['sort' => 'is_active', 'direction' => request('sort') == 'is_active' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                    class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 flex items-center gap-2">
                                    <i class="fas fa-toggle-on w-4"></i>Trạng Thái
                                    @if(request('sort') == 'is_active')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} text-purple-500"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-cogs mr-2 text-purple-500"></i>Hành Động
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($categories as $category)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                    #{{ $category->id }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                            class="h-12 w-12 rounded-lg object-cover border border-gray-200 dark:border-gray-600">
                                    @else
                                        <div class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $category->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ Str::limit($category->description, 50) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($category->is_active)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
                                            <i class="fas fa-check-circle mr-1"></i>Hoạt động
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200">
                                            <i class="fas fa-times-circle mr-1"></i>Tạm dừng
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('admin.categories.show', $category->id) }}" 
                                            title="Xem chi tiết"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-900/50 transition">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                            title="Chỉnh sửa"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-200 dark:hover:bg-amber-900/50 transition">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="inline-block" action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                title="Xóa"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-inbox text-4xl text-gray-400 dark:text-gray-600 mb-3"></i>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Không có danh mục nào</p>
                                        <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Hãy tạo danh mục đầu tiên để bắt đầu</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
            <div class="mt-6">
                <div class="flex justify-center">
                    {{ $categories->links('pagination::tailwind') }}
                </div>
            </div>
        @endif
    </div>
@endsection