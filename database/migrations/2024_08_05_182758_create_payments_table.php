<?php

use App\Models\Booking;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->                    id();
            $table->                    string('payment_method');
            $table->                    bigInteger('amount');
            $table->                    timestamp('payment_date');
            $table->                    enum('status', ['Successful', 'Failed']);

            $table->foreignIdFor(Booking::class)->constrained();

            $table->                    timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
