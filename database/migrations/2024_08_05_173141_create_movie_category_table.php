<?php

use App\Models\Category;
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
        Schema::create('movie_category', function (Blueprint $table) {
            $table->foreignIdFor(Movie::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();

            $table->primary(['movie_id', 'category_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_category');
    }
};
