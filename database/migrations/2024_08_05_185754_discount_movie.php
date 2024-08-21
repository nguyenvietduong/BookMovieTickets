<?php

use App\Models\Discount;
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
        Schema::create('discount_movie', function (Blueprint $table) {
            $table->foreignIdFor(Discount::class)->constrained();
            $table->foreignIdFor(Movie::class)->constrained();
            $table->softDeletes();  
            $table->timestamps();                                                  // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_movie');
    }
};
