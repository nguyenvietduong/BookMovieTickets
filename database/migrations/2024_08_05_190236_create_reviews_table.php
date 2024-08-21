<?php

use App\Models\Movie;
use App\Models\User;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->            id();                           // Tạo cột id tự động tăng

            $table->            integer('rating');              // Đánh giá phim (thường là từ 1 đến 5)
            $table->            text('comment');                // Nhận xét về phim

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Movie::class)->constrained();

            $table->            timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
