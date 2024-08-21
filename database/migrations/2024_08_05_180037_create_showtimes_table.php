<?php

use App\Models\Movie;
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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->                    id();

            $table->                    timestamp('start_timestamp');
            $table->                    timestamp('end_time');
            $table->                    bigInteger('price');

            $table->foreignIdFor(Movie::class)->constrained();
            $table->foreignIdFor(Screen::class)->constrained();

            $table->                    timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
