<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn quản lý #{{ $order->id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background: #fff;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #3b82f6;
        }
        
        .invoice-title {
            text-align: right;
        }
        
        .invoice-title h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .invoice-number {
            color: #666;
            font-size: 14px;
        }
        
        /* Customer & Shop Info */
        .info-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .info-block h3 {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 12px;
        }
        
        .info-block p {
            font-size: 14px;
            line-height: 1.8;
            color: #333;
        }
        
        /* Admin Info */
        .admin-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 15px;
            background-color: #f0f9ff;
            border: 1px solid #bfdbfe;
            border-radius: 6px;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .admin-info strong {
            display: block;
            color: #0369a1;
            margin-bottom: 5px;
        }
        
        /* Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .items-table thead {
            background-color: #f3f4f6;
        }
        
        .items-table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            color: #333;
            border: 1px solid #e5e7eb;
        }
        
        .items-table td {
            padding: 12px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }
        
        .items-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        /* Summary */
        .summary {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 40px;
        }
        
        .summary-box {
            width: 300px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }
        
        .summary-row.total {
            background-color: #3b82f6;
            color: white;
            padding: 15px;
            border: none;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
        
        /* Status */
        .status-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .status-box {
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid;
        }
        
        .status-pending {
            background-color: #fef3c7;
            border-left-color: #f59e0b;
        }
        
        .status-processing {
            background-color: #dbeafe;
            border-left-color: #3b82f6;
        }
        
        .status-shipped {
            background-color: #e9d5ff;
            border-left-color: #a855f7;
        }
        
        .status-delivered {
            background-color: #f0fdf4;
            border-left-color: #22c55e;
        }
        
        .status-cancelled {
            background-color: #fee2e2;
            border-left-color: #ef4444;
        }
        
        .status-label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
            font-size: 13px;
        }
        
        .status-value {
            font-weight: bold;
            font-size: 16px;
        }
        
        /* Footer & Signature */
        .footer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid #e5e7eb;
        }
        
        .signature-box {
            text-align: center;
        }
        
        .signature-line {
            border-top: 2px solid #333;
            margin-top: 40px;
            padding-top: 10px;
            font-size: 13px;
            color: #666;
        }
        
        .footer-text {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        
        /* Print Styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            
            .container {
                max-width: 100%;
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
            
            @page {
                margin: 1cm;
            }
        }
        
        /* Print Button */
        .print-button {
            display: block;
            margin-bottom: 20px;
            padding: 12px 24px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s;
        }
        
        .print-button:hover {
            background-color: #2563eb;
        }
        
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Print Button -->
        <div class="no-print" style="text-align: center; margin-bottom: 20px;">
            <button class="print-button" onclick="window.print()">
                <i class="fas fa-print"></i> In hóa đơn quản lý
            </button>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="logo">
                🌸 QUẢN LÝ ĐƠN HÀNG
            </div>
            <div class="invoice-title">
                <h1>HÓA ĐƠN</h1>
                <div class="invoice-number">Mã: #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>

        <!-- Customer & Shop Info -->
        <div class="info-section">
            <div class="info-block">
                <h3>Thông tin khách hàng</h3>
                <p>
                    <strong>{{ $order->customer->name ?? 'N/A' }}</strong><br>
                    Điện thoại: {{ $order->customer->phone ?? 'N/A' }}<br>
                    Email: {{ $order->customer->email ?? 'N/A' }}<br>
                    Địa chỉ: {{ $order->customer->address ?? 'N/A' }}<br>
                    {{ $order->customer->city ?? '' }}{{ $order->customer->state ? ', ' . $order->customer->state : '' }}
                </p>
            </div>
            
            <div class="info-block">
                <h3>Thông tin đơn hàng</h3>
                <p>
                    Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}<br>
                    Cập nhật: {{ $order->updated_at->format('d/m/Y H:i') }}<br>
                    <br>
                    <strong>Cửa hàng Hoa Tươi</strong><br>
                    📍 254 Nguyễn Văn Linh, Quận 7, TP.HCM<br>
                    📞 0123 456 789<br>
                    📧 support@flowershop.com
                </p>
            </div>
        </div>

        <!-- Admin Information -->
        <div class="admin-info">
            <div>
                <strong>Mã khách hàng:</strong>
                {{ $order->customer_id }}
            </div>
            <div>
                <strong>Trạng thái:</strong>
                {{ ucfirst($order->status) }}
            </div>
            <div>
                <strong>Phương thức thanh toán:</strong>
                Thanh toán khi nhận hàng (COD)
            </div>
            <div>
                <strong>Ghi chú nội bộ:</strong>
                N/A
            </div>
        </div>

        <!-- Status -->
        <div class="status-section">
            <div class="status-box status-{{ $order->status }}">
                <div class="status-label">Trạng thái đơn hàng</div>
                <div class="status-value">
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
                </div>
            </div>
            <div style="padding: 15px; background-color: #f3f4f6; border-radius: 6px;">
                <div class="status-label">Tổng cộng:</div>
                <div style="font-weight: bold; font-size: 16px; color: #3b82f6;">
                    {{ number_format($order->total_amount, 0, ',', '.') }} ₫
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 50%">Sản phẩm</th>
                    <th style="width: 15%" class="text-right">Đơn giá</th>
                    <th style="width: 15%" class="text-center">Số lượng</th>
                    <th style="width: 20%" class="text-right">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @forelse($order->orderItems as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->product->name ?? 'Sản phẩm đã xóa' }}</strong><br>
                            <span style="color: #666; font-size: 12px;">SKU: {{ $item->product->id ?? 'N/A' }}</span>
                        </td>
                        <td class="text-right">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-right"><strong>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫</strong></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center" style="padding: 40px; color: #999;">
                            Không có sản phẩm nào
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Summary -->
        <div class="summary">
            <div class="summary-box">
                <div class="summary-row">
                    <span>Tổng tiền hàng:</span>
                    <span>{{ number_format($order->total_amount, 0, ',', '.') }} ₫</span>
                </div>
                <div class="summary-row">
                    <span>Phí vận chuyển:</span>
                    <span>{{ number_format(30000, 0, ',', '.') }} ₫</span>
                </div>
                <div class="summary-row">
                    <span>Khuyến mãi:</span>
                    <span>{{ number_format(0, 0, ',', '.') }} ₫</span>
                </div>
                <div class="summary-row total">
                    <span>Tổng cộng:</span>
                    <span>{{ number_format($order->total_amount + 30000, 0, ',', '.') }} ₫</span>
                </div>
            </div>
        </div>

        <!-- Footer & Signature -->
        <div class="footer-section">
            <div class="signature-box">
                <p style="font-size: 13px; color: #666; margin-bottom: 50px;">Chữ ký khách hàng</p>
                <div class="signature-line">
                    Ngày: {{ now()->format('d/m/Y') }}
                </div>
            </div>
            <div class="signature-box">
                <p style="font-size: 13px; color: #666; margin-bottom: 50px;">Xác nhận của quản lý</p>
                <div class="signature-line">
                    Người xác nhận
                </div>
            </div>
        </div>

        <!-- Footer Text -->
        <div class="footer-text">
            <p><strong>Tài liệu quản lý nội bộ</strong></p>
            <p>Mọi thắc mắc vui lòng liên hệ: 0123 456 789 | support@flowershop.com</p>
            <p style="margin-top: 10px; color: #ccc;">In lúc {{ now()->format('d/m/Y H:i:s') }} | Hệ thống: Cửa Hàng Hoa Tươi v1.0</p>
        </div>
    </div>
</body>
</html>
