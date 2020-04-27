<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_setting', function (Blueprint $table) {
            $table->bigIncrements('id'); ;
            
            $table->string('offer');
            $table->string('delivery_time');
            $table->string('open_time');
            $table->string('close_time'); 
            $table->string('working_day'); 

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
        Schema::dropIfExists('order_setting');
    }
}
