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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id_comment');
            $table->string('description_comment');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_game');
            $table->timestamps();
        
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_game')->references('id_game')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
