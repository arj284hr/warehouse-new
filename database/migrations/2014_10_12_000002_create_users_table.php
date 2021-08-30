<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->foreign('warehouse_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->string('ssn', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 60)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            // $table->string('pay_system')->default('fix');
            // $table->string('pay')->nullable();
            $table->string('fix_pay')->nullable();
            $table->string('hourly_pay')->nullable();
            $table->string('overtime_pay')->nullable();
            $table->string('weekend_pay')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('job_title')->nullable();
            $table->timestamp('hiring_date')->nullable();
            $table->string('password')->nullable();
            $table->string('token')->nullable();
            $table->enum('type', USER_TYPES)->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
