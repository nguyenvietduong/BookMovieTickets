<?php

use App\Models\Screen;
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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->integer('seat_row');            // Hàng ghế từ 0 đến 8
            $table->string('seat_column', 1);       // Cột ghế từ A đến H
            $table->string('seat_type');

            $table->foreignIdFor(Screen::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
