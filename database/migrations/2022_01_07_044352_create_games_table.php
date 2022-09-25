<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('gameTitle');
            $table->bigInteger('genreID')->unsigned();
            $table->foreign('genreID')->references('id')->on('genres')->onDelete('cascade');
            $table->string('gameImage');
            $table->integer('gameRating');
            $table->longText('gameDescription');
            $table->integer('gamePrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
