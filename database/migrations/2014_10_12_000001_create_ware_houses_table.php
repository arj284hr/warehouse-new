<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamp('morning_opening_time')->nullable();
            $table->timestamp('morning_closing_time')->nullable();
            $table->timestamp('evening_opening_time')->nullable();
            $table->timestamp('evening_closing_time')->nullable();
            $table->timestamp('night_opening_time')->nullable();
            $table->timestamp('night_closing_time')->nullable();
            $table->timestamp('weekend_opening_time')->nullable();
            $table->timestamp('weekend_closing_time')->nullable();
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
        Schema::dropIfExists('ware_houses');
    }
}
