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
        Schema::table('performer_movies', function (Blueprint $table) {
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('performer_id')->references('id')->on('performers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performer_movies', function (Blueprint $table) {
            $table->dropForeign('performer_movies_movie_id_foreign');
            $table->dropForeign('performer_movies_performer_id_foreign');
        });
    }
};
