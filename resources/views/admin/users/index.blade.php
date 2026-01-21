@extends('layouts.admin')

@section('title', 'Quản lý Người dùng')
@section('page-title', 'Quản lý Người dùng')

@section('content')
    <div class="space-y-6 pb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                    <i class="fas fa-users text-blue-500"></i>
                    Quản lý Người dùng
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Xem, tìm kiếm và quản lý tất cả các người dùng hệ thống.</p>
            </div>
            <a href="{{ route('admin.users.create') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 dark:from-blue-600 dark:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 text-white font-medium rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>
                Tạo người dùng mới
            </a>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6">
            <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                        <i class="fas fa-search text-blue-500"></i>
                        Tìm kiếm
                    </label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        placeholder="Tên, tên đăng nhập, email..."
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500">
                </div>
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                        <i class="fas fa-shield-alt text-purple-500"></i>
                        Vai trò
                    </label>
                    <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500">
                        <option value="">Tất cả vai trò</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>Người dùng</option>
                    </select>
                </div>
                <div></div>
                <div class="flex items-end gap-2 justify-end">
                    <button type="submit" class="inline-flex items-center px-5 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                        <i class="fas fa-search mr-2"></i> Tìm kiếm
                    </button>
                    @if(request('search') || request('role'))
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-5 py-2 bg-gray-400 hover:bg-gray-500 dark:bg-gray-600 dark:hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-times mr-2"></i> Xóa lọc
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 text-gray-700 dark:text-gray-300 font-semibold text-sm border-b border-gray-200 dark:border-gray-700">
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.users.index', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-2 hover:text-gray-900 dark:hover:text-white transition">
                                    <i class="fas fa-hashtag text-blue-500"></i>
                                    ID
                                    @if(request('sort') == 'id')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.users.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-2 hover:text-gray-900 dark:hover:text-white transition">
                                    <i class="fas fa-user text-blue-500"></i>
                                    Họ tên
                                    @if(request('sort') == 'name')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.users.index', array_merge(request()->query(), ['sort' => 'email', 'direction' => request('sort') == 'email' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-2 hover:text-gray-900 dark:hover:text-white transition">
                                    <i class="fas fa-envelope text-blue-500"></i>
                                    Email
                                    @if(request('sort') == 'email')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-shield-alt text-purple-500"></i>
                                    Vai trò
                                </span>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.users.index', array_merge(request()->query(), ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-2 hover:text-gray-900 dark:hover:text-white transition">
                                    <i class="fas fa-calendar-alt text-blue-500"></i>
                                    Ngày tạo
                                    @if(request('sort') == 'created_at')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-center">
                                <span class="flex items-center justify-center gap-2">
                                    <i class="fas fa-cog text-purple-500"></i>
                                    Hành động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200 text-sm">
                        @forelse($users as $user)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                                <td class="py-4 px-6 text-left whitespace-nowrap">
                                    <span class="inline-block bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-lg font-medium text-gray-800 dark:text-gray-200">#{{ $user->id }}</span>
                                </td>
                                <td class="py-4 px-6 text-left">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center text-white text-xs font-bold">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-left text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                                <td class="py-4 px-6 text-left">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-800 dark:text-purple-300 text-xs font-semibold">
                                            <i class="fas fa-crown text-purple-500"></i>
                                            Quản trị viên
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300 text-xs font-semibold">
                                            <i class="fas fa-user-circle text-blue-500"></i>
                                            Người dùng
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-left text-gray-600 dark:text-gray-400">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('admin.users.show', $user->id) }}" 
                                            class="inline-flex items-center justify-center w-8 h-8 text-blue-500 hover:text-blue-700 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition-all duration-200 transform hover:scale-110" 
                                            title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                            class="inline-flex items-center justify-center w-8 h-8 text-yellow-500 hover:text-yellow-700 hover:bg-yellow-100 dark:hover:bg-yellow-900/30 rounded-lg transition-all duration-200 transform hover:scale-110" 
                                            title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="inline-block" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?\\n\\nHành động này không thể hoàn tác!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="inline-flex items-center justify-center w-8 h-8 text-red-500 hover:text-red-700 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-all duration-200 transform hover:scale-110" 
                                                title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 px-4 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-inbox text-4xl text-gray-300 dark:text-gray-600"></i>
                                        <p class="text-gray-500 dark:text-gray-400">Không có người dùng nào được tìm thấy.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection