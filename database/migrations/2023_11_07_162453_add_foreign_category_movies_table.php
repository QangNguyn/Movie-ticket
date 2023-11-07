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
        Schema::table('category_movies', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_movies', function ($table) {
            $table->dropForeign('category_movies_movie_id_foreign');
            $table->dropForeign('category_movies_category_id_foreign');
        });
    }
};
