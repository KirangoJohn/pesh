<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_name');
            $table->string('national_id');
            $table->string('vehicle_no');
            $table->string('gnr');
            $table->string('date');
            $table->integer('size');
            $table->string('weight');
            $table->string('cartons');
            $table->string('fruit_type');
            $table->string('buying_price');
            $table->string('selling_price');
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
        Schema::dropIfExists('sales');
    }
}
