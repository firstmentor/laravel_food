<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('restaurant_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('image');
            $table->string('name');
            $table->string('categories');
            $table->string('open_time');
            $table->string('close_time');
            $table->string('offer');
            $table->string('delivery_time');
            $table->string('address');
            $table->string('cost_for_two'); 
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
        Schema::dropIfExists('restaurant');
    }
}
