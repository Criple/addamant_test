<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('tires_manufacturers');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('tires_models');
            $table->string('name')->nullable();
            $table->integer('width')->nullable();
            $table->integer('profile')->nullable();
            $table->string('diameter')->nullable();
            $table->string('load_index')->nullable();
            $table->string('speed_index')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('parsed_valid')->default(false);
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
        Schema::dropIfExists('tires');
    }
}
