<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();                                           // Tạo cột id tự động tăng
            $table->string('code')->unique();                       // Tạo cột code kiểu varchar, đảm bảo giá trị duy nhất
            $table->bigInteger('amount');                           // Số tiền giảm giá
            $table->dateTime('valid_from');                         // Ngày bắt đầu áp dụng
            $table->dateTime('valid_to');                           // Ngày kết thúc áp dụng
            $table->unsignedInteger('max_uses')->nullable();        // Số lượng tối đa mã giảm giá có thể được sử dụng
            $table->unsignedInteger('used_count')->default(0);      // Số lượng hiện tại đã sử dụng
            $table->softDeletes();
            $table->timestamps();                                   // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
