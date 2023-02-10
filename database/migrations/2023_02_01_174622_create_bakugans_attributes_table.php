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
        Schema::create('bakugans_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bakugan_id');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('bakugan_id')->references('id')->on('bakugans');
            $table->foreign('attribute_id')->references('id')->on('attributes');
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
        Schema::dropIfExists('bakugan_attributes');
    }
};
