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
        Schema::create('games', function (Blueprint $table) {
            $table->id('id_game');
            $table->string('name_game');
            $table->string('link_game');
            $table->date('dateS_game');
            $table->string('description_game');
            $table->string('image_game');
            $table->unsignedBigInteger('id_requirement');
            $table->unsignedBigInteger('id_category');
            $table->timestamps();
        
            $table->foreign('id_requirement')->references('id_requirement')->on('requirements');
            $table->foreign('id_category')->references('id_category')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
