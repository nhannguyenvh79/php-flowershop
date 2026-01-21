@extends('layouts.admin')

@section('title', ' - Xem người dùng')
@section('page-title', 'Chi tiết người dùng')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-12">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                    <i class="fas fa-user-circle text-blue-500"></i>
                    {{ $user->name }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    <i class="fas fa-envelope mr-1"></i>
                    {{ $user->email }}
                </p>
            </div>
            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="inline-flex items-center px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-edit mr-2"></i> Chỉnh sửa
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-5 py-2 bg-gray-500 hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Quay lại
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - User Info Cards -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Account Information Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                            <i class="fas fa-lock text-blue-500"></i>
                            Thông Tin Tài Khoản
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                    <i class="fas fa-hashtag text-gray-400"></i>
                                    ID
                                </p>
                                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->id }}</p>
                            </div>
                            <div class="col-span-1">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                    <i class="fas fa-at text-gray-400"></i>
                                    Tên Đăng Nhập
                                </p>
                                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->username }}</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                <i class="fas fa-envelope text-gray-400"></i>
                                Email
                            </p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white break-all">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Personal Information Card -->
                @if($user->phone || $user->address || $user->city)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                <i class="fas fa-address-card text-purple-500"></i>
                                Thông Tin Cá Nhân
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            @if($user->phone)
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                        <i class="fas fa-phone text-gray-400"></i>
                                        Số Điện Thoại
                                    </p>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->phone }}</p>
                                </div>
                            @endif
                            @if($user->address)
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                        <i class="fas fa-home text-gray-400"></i>
                                        Địa Chỉ
                                    </p>
                                    <p class="text-gray-900 dark:text-white">{{ $user->address }}</p>
                                </div>
                            @endif
                            @if($user->city || $user->state)
                                <div class="grid grid-cols-2 gap-4">
                                    @if($user->city)
                                        <div>
                                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1">Thành Phố</p>
                                            <p class="text-gray-900 dark:text-white">{{ $user->city }}</p>
                                        </div>
                                    @endif
                                    @if($user->state)
                                        <div>
                                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1">Tỉnh/Quốc Gia</p>
                                            <p class="text-gray-900 dark:text-white">{{ $user->state }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Status & Dates -->
            <div class="space-y-6">
                <!-- Role Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                            <i class="fas fa-shield-alt text-purple-500"></i>
                            Vai Trò
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($user->role === 'admin')
                            <div class="flex items-center justify-center p-4 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                                <span class="inline-flex items-center gap-2 text-purple-800 dark:text-purple-200 font-bold text-lg">
                                    <i class="fas fa-crown text-purple-500 text-xl"></i>
                                    Quản Trị Viên
                                </span>
                            </div>
                        @else
                            <div class="flex items-center justify-center p-4 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <span class="inline-flex items-center gap-2 text-blue-800 dark:text-blue-200 font-bold text-lg">
                                    <i class="fas fa-user-circle text-blue-500 text-xl"></i>
                                    Người Dùng
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Activity Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                            <i class="fas fa-calendar-check text-green-500"></i>
                            Hoạt Động
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                <i class="fas fa-plus-circle text-green-500"></i>
                                Tạo Tài Khoản
                            </p>
                            <p class="text-gray-900 dark:text-white font-medium">
                                {{ $user->created_at->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $user->created_at->format('H:i') }} • 
                                {{ $user->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                                <i class="fas fa-sync-alt text-blue-500"></i>
                                Cập Nhật Lần Cuối
                            </p>
                            <p class="text-gray-900 dark:text-white font-medium">
                                {{ $user->updated_at->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $user->updated_at->format('H:i') }} • 
                                {{ $user->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email Verification Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-50 to-orange-100 dark:from-orange-900/30 dark:to-orange-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                            <i class="fas fa-envelope-open text-orange-500"></i>
                            Xác Minh Email
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($user->email_verified_at)
                            <div class="flex items-center justify-center p-4 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                <div class="text-center">
                                    <i class="fas fa-check-circle text-green-500 text-3xl mb-2 block"></i>
                                    <p class="text-green-800 dark:text-green-200 font-semibold">Đã Xác Minh</p>
                                    <p class="text-sm text-green-700 dark:text-green-300 mt-1">
                                        {{ $user->email_verified_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center justify-center p-4 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                                <div class="text-center">
                                    <i class="fas fa-exclamation-circle text-yellow-500 text-3xl mb-2 block"></i>
                                    <p class="text-yellow-800 dark:text-yellow-200 font-semibold">Chưa Xác Minh</p>
                                    <p class="text-sm text-yellow-700 dark:text-yellow-300 mt-1">
                                        Người dùng chưa xác minh email
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Section -->
        <div class="mt-8 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-6">
            <div class="flex items-start gap-4">
                <i class="fas fa-trash-alt text-red-500 text-2xl flex-shrink-0 mt-1"></i>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">Xóa Tài Khoản</h3>
                    <p class="text-sm text-red-700 dark:text-red-300 mt-1">
                        Hành động này không thể hoàn tác. Vui lòng chắc chắn trước khi xóa.
                    </p>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?\\n\\nHành động này sẽ xóa vĩnh viễn người dùng ' + '{{ $user->name }}' + '\\n\\nĐiều này không thể hoàn tác!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-all duration-200">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Xóa Người Dùng
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection