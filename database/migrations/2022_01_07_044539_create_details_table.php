<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->unsignedBigInteger('transactionID');
            $table->foreign('transactionID')->references('transactionID')->on('headers')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('gameID')->unsigned();
            $table->foreign('gameID')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('subTotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
