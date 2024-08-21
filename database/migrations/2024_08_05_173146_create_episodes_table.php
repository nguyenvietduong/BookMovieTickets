<?php

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
        Schema::create('episodes', function (Blueprint $table) {
            $table      ->      id();

            $table      ->      string('server_name');

            $table      ->      string('name')          ->index();

            $table      ->      string('slug')          ->index();

            $table      ->      string('filename')      ->index();

            $table      ->      string('link_embed')    ->nullable();

            $table      ->      string('link_m3u8')     ->nullable();

            $table->foreignIdFor(Movie::class)->constrained();

            $table      ->      timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
