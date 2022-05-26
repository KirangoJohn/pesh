<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightPriceFruitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weight');
            $table->integer('size_id');
            $table->timestamps();
        });
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price');
            $table->integer('fruit_id');
            $table->timestamps();
        });
        Schema::create('friuts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::dropIfExists('weight_price_fruit_tables');
    }
}
