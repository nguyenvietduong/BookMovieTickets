<?php

use App\Models\Country;
use App\Models\Movie;
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
        Schema::create('movie_country', function (Blueprint $table) {

            $table->foreignIdFor(Movie::class)->constrained();
            $table->foreignIdFor(Country::class)->constrained();

            $table->        primary(['movie_id', 'country_id']);

            $table->        timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_country');
    }
};
