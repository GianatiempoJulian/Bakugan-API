<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('bakugans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('serie_id');
            $table->integer('power');
            $table->string('image');
            $table->foreign('serie_id')->references('id')->on('series');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bakugans');
    }
};
