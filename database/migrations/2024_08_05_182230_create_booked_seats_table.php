<?php

use App\Models\Booking;
use App\Models\Seat;
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
        Schema::create('booked_seats', function (Blueprint $table) {
            $table->id();
            $table->                    bigInteger('price');

            $table->foreignIdFor(Booking::class)->constrained();
            $table->foreignIdFor(Seat::class)->constrained();

            $table->timestamps();

            // Đảm bảo không có ghế nào được đặt nhiều lần trong một đơn đặt vé
            $table->unique(['booking_id', 'seat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_seats');
    }
};
