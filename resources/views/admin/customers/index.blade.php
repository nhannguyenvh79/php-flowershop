@extends('layouts.admin')

@section('title', 'Quản lý Khách hàng')
@section('page-title', 'Quản lý Khách hàng')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent">Quản lý Khách hàng</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Xem, tìm kiếm và quản lý tất cả các khách hàng</p>
            </div>
            <a href="{{ route('admin.customers.create') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-700 dark:to-blue-800 dark:hover:from-blue-800 dark:hover:to-blue-900 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>
                Tạo khách hàng mới
            </a>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6 transition-all duration-300">
            <form method="GET" action="{{ route('admin.customers.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="col-span-1 sm:col-span-2">
                        <label for="search" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tìm kiếm khách hàng</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400 dark:text-gray-600"></i>
                            <input type="text" id="search" name="search" value="{{ request('search') }}"
                                placeholder="Nhập tên, email hoặc số điện thoại..."
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 shadow-sm hover:shadow-md">
                        </div>
                    </div>
                    <div></div>
                    <div class="flex items-end gap-2 justify-end">
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-semibold rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            <i class="fas fa-search mr-2"></i> Tìm kiếm
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.customers.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 text-white font-semibold rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                                <i class="fas fa-times mr-2"></i> Xóa
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-gray-700 dark:to-gray-600 border-b-2 border-blue-200 dark:border-gray-600">
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.customers.index', array_merge(request()->query(), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center text-gray-700 dark:text-gray-200 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">
                                    <i class="fas fa-hashtag mr-2 text-blue-500"></i>ID
                                    @if(request('sort') == 'id')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2 text-blue-500"></i>
                                    @else
                                        <i class="fas fa-sort ml-2 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.customers.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('sort') == 'name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center text-gray-700 dark:text-gray-200 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">
                                    <i class="fas fa-user mr-2 text-blue-500"></i>Tên khách hàng
                                    @if(request('sort') == 'name')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2 text-blue-500"></i>
                                    @else
                                        <i class="fas fa-sort ml-2 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.customers.index', array_merge(request()->query(), ['sort' => 'email', 'direction' => request('sort') == 'email' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center text-gray-700 dark:text-gray-200 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">
                                    <i class="fas fa-envelope mr-2 text-blue-500"></i>Email
                                    @if(request('sort') == 'email')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2 text-blue-500"></i>
                                    @else
                                        <i class="fas fa-sort ml-2 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <span class="text-gray-700 dark:text-gray-200 font-semibold flex items-center">
                                    <i class="fas fa-phone mr-2 text-blue-500"></i>Số điện thoại
                                </span>
                            </th>
                            <th class="py-4 px-6 text-left">
                                <a href="{{ route('admin.customers.index', array_merge(request()->query(), ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center text-gray-700 dark:text-gray-200 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">
                                    <i class="fas fa-calendar mr-2 text-blue-500"></i>Ngày tạo
                                    @if(request('sort') == 'created_at')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ml-2 text-blue-500"></i>
                                    @else
                                        <i class="fas fa-sort ml-2 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-4 px-6 text-center text-gray-700 dark:text-gray-200 font-semibold">
                                <i class="fas fa-cogs mr-2 text-blue-500"></i>Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($customers as $customer)
                            <tr class="hover:bg-blue-50 dark:hover:bg-gray-700/50 transition-all duration-200">
                                <td class="py-4 px-6 text-left whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">#{{ $customer->id }}</span>
                                </td>
                                <td class="py-4 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold mr-3">
                                            {{ substr($customer->name, 0, 1) }}
                                        </div>
                                        <span class="text-gray-900 dark:text-gray-100 font-medium">{{ $customer->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-left">
                                    <span class="text-gray-700 dark:text-gray-300">{{ $customer->email }}</span>
                                </td>
                                <td class="py-4 px-6 text-left">
                                    <span class="text-gray-700 dark:text-gray-300">{{ $customer->phone ?? '-' }}</span>
                                </td>
                                <td class="py-4 px-6 text-left">
                                    <span class="text-gray-700 dark:text-gray-300">{{ $customer->created_at->format('d/m/Y H:i') }}</span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('admin.customers.show', $customer->id) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-all duration-200 transform hover:scale-110" title="Xem">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.customers.edit', $customer->id) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 hover:bg-yellow-200 dark:hover:bg-yellow-900/50 transition-all duration-200 transform hover:scale-110" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="inline-block" action="{{ route('admin.customers.destroy', $customer->id) }}"
                                            method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa khách hàng này không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 transition-all duration-200 transform hover:scale-110" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 px-6 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-inbox text-4xl text-gray-400 dark:text-gray-600 mb-3"></i>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Không có khách hàng nào được tìm thấy</p>
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
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-4">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
@endsection