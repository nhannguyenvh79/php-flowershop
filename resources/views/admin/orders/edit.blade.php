@extends('layouts.admin')

@section('title', 'Chỉnh Sửa Đơn Hàng')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-shopping-bag mr-3 text-blue-500"></i>Chỉnh Sửa Đơn Hàng #{{ $order->id }}
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Ngày đặt: <span class="font-semibold">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </p>
            </div>
            <a href="{{ route('admin.orders.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i> Quay lại
            </a>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-600 p-4 rounded">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 dark:text-red-400 mt-0.5 mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-red-800 dark:text-red-200 mb-2">Có lỗi xảy ra:</h3>
                        <ul class="list-disc list-inside text-red-700 dark:text-red-300 text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" id="orderForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Order Status Section -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-tasks mr-3 text-blue-500"></i>Trạng Thái Đơn Hàng
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-clipboard-check mr-2 text-blue-500"></i>Trạng thái đơn hàng
                                    </label>
                                    <select name="status" id="status"
                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                            <i class="fas fa-clock"></i> Chờ xử lý
                                        </option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                            <i class="fas fa-cog"></i> Đang xử lý
                                        </option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                            <i class="fas fa-box"></i> Đã gửi
                                        </option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                            <i class="fas fa-check"></i> Đã giao
                                        </option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                            <i class="fas fa-times"></i> Đã hủy
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label for="payment_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-credit-card mr-2 text-green-500"></i>Trạng thái thanh toán
                                    </label>
                                    <select name="payment_status" id="payment_status"
                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition">
                                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                            Chờ thanh toán
                                        </option>
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>
                                            Đã thanh toán
                                        </option>
                                        <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>
                                            Đã hoàn tiền
                                        </option>
                                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>
                                            Thất bại
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address Section -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-map-marker-alt mr-3 text-purple-500"></i>Địa Chỉ & Vận Chuyển
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Địa chỉ giao hàng
                                </label>
                                <textarea name="shipping_address" id="shipping_address" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 transition font-mono text-sm"
                                    placeholder="Nhập địa chỉ giao hàng đầy đủ...">{{ old('shipping_address', $order->shipping_address) }}</textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="tracking_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-barcode mr-2 text-purple-500"></i>Mã vận đơn
                                    </label>
                                    <input type="text" name="tracking_number" id="tracking_number"
                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 transition"
                                        placeholder="VN12345678..."
                                        value="{{ old('tracking_number', $order->tracking_number) }}">
                                </div>
                                <div>
                                    <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-wallet mr-2 text-purple-500"></i>Phương thức thanh toán
                                    </label>
                                    <input type="text" name="payment_method" id="payment_method"
                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 transition"
                                        placeholder="COD / Chuyển khoản..."
                                        value="{{ old('payment_method', $order->payment_method ?? 'COD') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items Section -->
                    @if($order->orderItems && $order->orderItems->count() > 0)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 dark:from-indigo-900/30 dark:to-indigo-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                    <i class="fas fa-box mr-3 text-indigo-500"></i>Danh Sách Sản Phẩm
                                </h2>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Sản phẩm</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Số lượng</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Giá</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($order->orderItems as $item)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ $item->product->name ?? 'N/A' }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ number_format($item->price, 0, ',', '.') }} ₫
                                                </td>
                                                <td class="px-6 py-4 text-sm text-right font-semibold text-gray-900 dark:text-white">
                                                    {{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Customer Info -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/30 dark:to-green-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-user mr-3 text-green-500"></i>Khách Hàng
                            </h2>
                        </div>
                        <div class="p-6">
                            <select name="customer_id" id="customer_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition mb-4">
                                <option value="">-- Chọn khách hàng --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }} ({{ $customer->email }})
                                    </option>
                                @endforeach
                            </select>
                            @if($order->customer)
                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 space-y-2 text-sm">
                                    <p class="text-gray-600 dark:text-gray-400">
                                        <span class="font-medium text-gray-900 dark:text-white">Tên:</span> {{ $order->customer->name }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        <span class="font-medium text-gray-900 dark:text-white">Email:</span> {{ $order->customer->email }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        <span class="font-medium text-gray-900 dark:text-white">Số điện thoại:</span> {{ $order->customer->phone ?? 'N/A' }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-orange-50 to-orange-100 dark:from-orange-900/30 dark:to-orange-800/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-calculator mr-3 text-orange-500"></i>Tóm Tắt Đơn Hàng
                            </h2>
                        </div>
                        <div class="p-6 space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Tổng tiền hàng:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($order->total_amount, 0, ',', '.') }} ₫</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Phí vận chuyển:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }} ₫</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Thuế:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($order->tax ?? 0, 0, ',', '.') }} ₫</span>
                            </div>
                            <div class="pt-3 border-t border-gray-200 dark:border-gray-700 flex justify-between">
                                <span class="font-semibold text-gray-900 dark:text-white">Tổng cộng:</span>
                                <span class="text-lg font-bold text-blue-600 dark:text-blue-400">{{ number_format($order->total_amount + ($order->shipping_cost ?? 0) + ($order->tax ?? 0), 0, ',', '.') }} ₫</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Badges -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @if($order->status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                    @elseif($order->status == 'processing') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300
                                    @elseif($order->status == 'shipped') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300
                                    @elseif($order->status == 'delivered') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                    @endif">
                                    @switch($order->status)
                                        @case('pending')
                                            Chờ xử lý
                                            @break
                                        @case('processing')
                                            Đang xử lý
                                            @break
                                        @case('shipped')
                                            Đã gửi
                                            @break
                                        @case('delivered')
                                            Đã giao
                                            @break
                                        @default
                                            Đã hủy
                                    @endswitch
                                </span>
                            </div>
                            <div class="flex items-center">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @if($order->payment_status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                    @elseif($order->payment_status == 'paid') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                    @endif">
                                    {{ $order->payment_status == 'pending' ? 'Chờ thanh toán' : ($order->payment_status == 'paid' ? 'Đã thanh toán' : ($order->payment_status == 'refunded' ? 'Đã hoàn tiền' : 'Thất bại')) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex gap-4 justify-end">
                <a href="{{ route('admin.orders.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition font-medium">
                    <i class="fas fa-times mr-2"></i> Hủy
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 dark:from-blue-600 dark:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 text-white rounded-lg transition font-medium shadow-lg hover:shadow-xl">
                    <i class="fas fa-save mr-2"></i> Cập Nhật Đơn Hàng
                </button>
            </div>
        </form>
    </div>

    <style>
        /* Custom scrollbar for tables */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        .overflow-x-auto::-webkit-scrollbar-track {
            background: transparent;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .dark .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #475569;
        }
        .dark .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style>
@endsection