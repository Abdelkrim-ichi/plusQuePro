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
            $table->id()->index();
            $table->bigInteger('movie_id')->index();
            $table->string('title')->index();
            $table->string('overview');
            $table->string('poster_path');
            $table->timestamp('release_date');
            $table->double('vote_average');
            $table->double('popularity');
            $table->string('original_language');
            $table->string('original_title');
            $table->string('backdrop_path');
            $table->string('video');
            $table->boolean('adult');
            $table->bigInteger('vote_count');
            $table->string('genre_ids');
            $table->string('media_type');
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
