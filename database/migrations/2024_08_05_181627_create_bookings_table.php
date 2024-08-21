<?php

use App\Models\Showtime;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->                    id();
            $table->                    bigInteger('total_amount');
            $table->                    timestamp('booking_date');
            $table->                    enum('payment_status', ['Paid', 'Pending']);

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Showtime::class)->constrained();

            $table->                    timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
