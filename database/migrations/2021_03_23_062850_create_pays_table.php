<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('load_id')->nullable();
            $table->foreign('load_id')->references('id')->on('in_out_loads')->onDelete('cascade');
            $table->string('pay_system')->nullable();
            $table->unsignedBigInteger('associate_id')->nullable();
            $table->foreign('associate_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ssn_associate')->nullable();
            $table->string('hourly_pay')->nullable();
            $table->string('hours')->nullable();
            $table->string('pay_percentage_associate')->nullable();
            $table->string('payout_associate')->nullable();
            $table->timestamp('load_project_date')->nullable();
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
        Schema::dropIfExists('pays');
    }
}
