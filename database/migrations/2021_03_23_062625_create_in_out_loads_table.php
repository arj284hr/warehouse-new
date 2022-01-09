<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInOutLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_out_loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('ware_houses')->onDelete('cascade');
            // $table->unsignedBigInteger('location_id')->nullable();
            // $table->foreign('location_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->unsignedBigInteger('bill_to_id')->nullable();
            $table->foreign('bill_to_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('driver_name', 100)->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('load_project_date')->nullable();
            $table->string('load_project_type')->nullable();
            $table->string('location')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('check_type')->nullable();
            $table->string('check_number')->nullable();
            $table->string('carrier')->nullable();
            $table->string('truck_no')->nullable();
            $table->string('trailer_no')->nullable();
            $table->string('shift')->nullable();
            $table->string('dock')->nullable();
            $table->string('load_project_control_no')->nullable();
            $table->string('trip_no')->nullable();
            $table->string('trailer_type')->nullable();
            $table->string('trailer_size')->nullable();
            $table->timestamp('project_start_time')->nullable();
            $table->timestamp('project_end_time')->nullable();
            $table->string('in_out_load')->nullable();
            $table->string('door_no')->nullable();
            $table->string('weight')->nullable();
            $table->string('po_no')->nullable();
            $table->string('load_project_trip_no')->nullable();
            $table->string('bol_shipment_no')->nullable();
            $table->string('shipper')->nullable();
            $table->string('vendor')->nullable();
            $table->string('begin_case_ct')->nullable();
            $table->string('ending_case_ct')->nullable();
            $table->string('begin_pallet_ct')->nullable();
            $table->string('ending_pallet_ct')->nullable();
            $table->string('total_skus')->nullable();
            $table->string('pieces')->nullable();
            $table->string('pallets_in')->nullable();
            $table->string('pallets_out')->nullable();
            $table->string('begin_ship_packs')->nullable();
            $table->string('ending_ship_packs')->nullable();
            $table->string('late_no_show_charge')->nullable();
            $table->string('repalletize_pallets')->nullable();
            $table->string('repalletize_charge')->nullable();
            $table->string('bad_pallets')->nullable();
            $table->string('bad_pallet_charge')->nullable();
            $table->string('reload_charge')->nullable();
            $table->string('special_charges')->nullable();
            $table->string('charge_amount1')->nullable();
            $table->string('notes')->nullable();
            $table->string('charge_amount')->nullable();
            $table->string('rebate_percentage')->nullable();
            $table->string('total_income_less_rebate')->nullable();
            $table->string('employee_percentage')->nullable();
            $table->string('employee_total_pay')->nullable();
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
        Schema::dropIfExists('in_out_loads');
    }
}
