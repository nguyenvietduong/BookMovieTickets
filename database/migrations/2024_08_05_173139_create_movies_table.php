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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('origin_name');
            $table->text('content');
            $table->enum('type', ['phimngan', 'phimbo', 'phimle'])->index();
            $table->enum('status', ['completed', 'ongoing'])->index();
            $table->string('director')->nullable();
            $table->string('poster_url');
            $table->string('thumb_url');
            $table->string('album_url')->nullable();
            $table->boolean('is_copyright')->default(false);
            $table->boolean('sub_docquyen')->default(false);
            $table->boolean('chieurap')->default(false);
            $table->string('trailer_url')->nullable();
            $table->string('time')->nullable();
            $table->string('episode_current')->nullable();
            $table->string('episode_total')->nullable();
            $table->string('quality')->nullable();
            $table->string('lang')->nullable();
            $table->integer('year')->index();
            $table->unsignedBigInteger('view')->default(0)->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
