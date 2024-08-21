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

        Schema::table('discount_movie', function (Blueprint $table) {
            // Thêm chỉ mục đơn cho cột user_id
            $table->index('discount_id');

            // Thêm chỉ mục đơn cho cột showtime_id
            $table->index('movie_id');

            // Thêm chỉ mục hợp nhất cho các cột user_id và showtime_id nếu cần
            $table->unique(['discount_id', 'movie_id']);
        });

        Schema::table('episodes', function (Blueprint $table) {
            $table->index('movie_id');
        });

        Schema::table('movie_actor', function (Blueprint $table) {
            $table->index('movie_id');
            $table->index('actor_id');
        });

        Schema::table('movie_country', function (Blueprint $table) {
            $table->index('movie_id');
            $table->index('country_id');
        });

        Schema::table('movie_category', function (Blueprint $table) {
            $table->index('movie_id');
            $table->index('category_id');
        });

        Schema::table('reviews', function (Blueprint $table) {
            // Thêm chỉ mục đơn cho cột user_id
            $table->index('user_id');

            // Thêm chỉ mục đơn cho cột showtime_id
            $table->index('movie_id');

            // Thêm chỉ mục hợp nhất cho các cột user_id và showtime_id nếu cần
            $table->unique(['user_id', 'movie_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            // Thêm chỉ mục đơn cho cột booking_id
            $table->index('booking_id');
        });

        Schema::table('bookings', function (Blueprint $table) {
            // Thêm chỉ mục đơn cho cột user_id
            $table->index('user_id');

            // Thêm chỉ mục đơn cho cột showtime_id
            $table->index('showtime_id');

            // Thêm chỉ mục hợp nhất cho các cột user_id và showtime_id nếu cần
            $table->unique(['user_id', 'showtime_id']);
        });

        Schema::table('seats', function (Blueprint $table) {
            $table->index('screen_id');
        });

        Schema::table('showtimes', function (Blueprint $table) {
            $table->index('movie_id');
            $table->index('screen_id');
        });

        Schema::table('booked_seats', function (Blueprint $table) {
            // Thêm chỉ mục đơn cho cột booking_id
            $table->index('booking_id');

            // Thêm chỉ mục đơn cho cột seat_id
            $table->index('seat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discount_movie', function (Blueprint $table) {
            $table->dropIndex(['discount_id']);
            $table->dropIndex(['movie_id']);
            $table->dropUnique(['discount_id', 'movie_id']);
        });

        Schema::table('episodes', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
        });

        Schema::table('movie_actor', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
            $table->dropIndex(['actor_id']);
        });

        Schema::table('movie_country', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
            $table->dropIndex(['country_id']);
        });

        Schema::table('movie_category', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
            $table->dropIndex(['category_id']);
        });

        Schema::table('movie_genre', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
            $table->dropIndex(['genre_id']);
            $table->dropUnique(['movie_id', 'genre_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            // Xóa chỉ mục hợp nhất
            $table->dropUnique(['user_id', 'movie_id']);

            // Xóa chỉ mục đơn cho cột user_id
            $table->dropIndex(['user_id']);

            // Xóa chỉ mục đơn cho cột showtime_id
            $table->dropIndex(['movie_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            // Xóa chỉ mục đơn cho cột booking_id
            $table->dropIndex(['booking_id']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            // Xóa chỉ mục hợp nhất
            $table->dropUnique(['user_id', 'showtime_id']);

            // Xóa chỉ mục đơn cho cột user_id
            $table->dropIndex(['user_id']);

            // Xóa chỉ mục đơn cho cột showtime_id
            $table->dropIndex(['showtime_id']);
        });

        Schema::table('seats', function (Blueprint $table) {
            $table->dropIndex(['screen_id']);
        });

        Schema::table('showtimes', function (Blueprint $table) {
            $table->dropIndex(['movie_id']);
            $table->dropIndex(['screen_id']);
        });

        Schema::table('booked_seats', function (Blueprint $table) {
            // Xóa chỉ mục đơn cho cột booking_id
            $table->dropIndex(['booking_id']);

            // Xóa chỉ mục đơn cho cột seat_id
            $table->dropIndex(['seat_id']);
        });
    }
};
