@extends('layouts.admin')

@section('title', 'Chi tiết khách hàng')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent">
                    <i class="fas fa-user-circle mr-3"></i>Chi tiết khách hàng
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">ID: <span class="font-semibold text-gray-900 dark:text-white">#{{ $customer->id }}</span></p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.customers.edit', $customer->id) }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 dark:from-yellow-600 dark:to-yellow-700 dark:hover:from-yellow-700 dark:hover:to-yellow-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-edit mr-2"></i> Chỉnh sửa
                </a>
                <a href="{{ route('admin.customers.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-gray-400 hover:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Quay lại
                </a>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Thông Tin Khách Hàng -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-address-card mr-3 text-blue-500"></i>Thông Tin Cơ Bản
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Họ tên
                            </p>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $customer->name }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email
                            </p>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $customer->email }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center">
                                <i class="fas fa-phone mr-2 text-blue-500"></i>Số điện thoại
                            </p>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $customer->phone ?? '-' }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-1 flex items-center">
                                <i class="fas fa-calendar mr-2 text-blue-500"></i>Ngày tạo
                            </p>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $customer->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Địa Chỉ -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-purple-500"></i>Địa Chỉ
                    </h2>
                </div>
                <div class="p-6">
                    <p class="text-gray-900 dark:text-gray-100 leading-relaxed">
                        {{ $customer->address ?? '<span class="text-gray-400 italic">Chưa có địa chỉ</span>' }}
                    </p>
                </div>
            </div>

            <!-- Đơn Hàng -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-shopping-cart mr-3 text-green-500"></i>Đơn hàng ({{ $customer->orders ? $customer->orders->count() : 0 }})
                    </h2>
                </div>
                <div class="p-6">
                    @if($customer->orders && $customer->orders->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-hashtag mr-2 text-green-500"></i>Mã đơn
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-calendar mr-2 text-green-500"></i>Ngày đặt
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-money-bill mr-2 text-green-500"></i>Tổng tiền
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-info-circle mr-2 text-green-500"></i>Trạng thái
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-cogs mr-2 text-green-500"></i>Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($customer->orders as $order)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors duration-200">
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300">#{{ $order->id }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300 font-semibold">{{ number_format($order->total_amount, 0) }}₫</td>
                                            <td class="px-6 py-4">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                                    {{ $order->status == 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : '' }}
                                                    {{ $order->status == 'processing' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300' : '' }}
                                                    {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' : '' }}
                                                    {{ !in_array($order->status, ['completed', 'processing', 'cancelled']) ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300' : '' }}">
                                                    <i class="fas fa-circle mr-1 text-xs"></i>{{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                    class="inline-flex items-center px-3 py-2 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-200 dark:hover:bg-green-900/50 transition-all duration-200">
                                                    <i class="fas fa-eye mr-2"></i> Xem
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-12">
                            <i class="fas fa-box-open text-4xl text-gray-400 dark:text-gray-600 mb-3"></i>
                            <p class="text-gray-500 dark:text-gray-400 font-medium">Không có đơn hàng nào cho khách hàng này</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection