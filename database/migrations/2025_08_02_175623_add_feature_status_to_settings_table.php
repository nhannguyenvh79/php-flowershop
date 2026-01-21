<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Thêm cột status để quản lý trạng thái tính năng: 'enabled', 'disabled', 'development'
            $table->string('status')->default('enabled')->after('options');
            
            // Thêm cột notes để ghi chú về tính năng
            $table->text('notes')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['status', 'notes']);
        });
    }
};
