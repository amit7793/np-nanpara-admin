<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('house_number')->nullable();
            $table->string('colony_name')->nullable();
            $table->string('street_name')->nullable();
            $table->string('village')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('existing_property_id')->nullable();

            $table->string('property_usage_type')->nullable();
            $table->string('property_type')->nullable();
            $table->string('rainwater_harvesting_property')->nullable();

            $table->string('unit_usage_type')->nullable();
            $table->string('sub_usage_type')->nullable();
            $table->string('occupancy')->nullable();
            $table->decimal('supper_built_up_area')->nullable();
            $table->string('floor')->nullable();

            $table->decimal('plot_size')->nullable();
            $table->string('no_of_floors')->nullable();

            $table->decimal('v_plot_size')->nullable();

            $table->string('ownership_type')->nullable();
            $table->string('name')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('mobile')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('category')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();

            $table->string('address_proof')->nullable();
            $table->string('identify_proof')->nullable();
            $table->string('registration_proof')->nullable();
            $table->string('usage_proof')->nullable();
            $table->string('occupancy_proof')->nullable();
            $table->string('construction_proof')->nullable();

            $table->string('address_proof_img')->nullable();
            $table->string('identify_proof_img')->nullable();
            $table->string('registration_proof_img')->nullable();
            $table->string('usage_proof_img')->nullable();
            $table->string('occupancy_proof_img')->nullable();
            $table->string('construction_proof_img')->nullable();
            $table->string('declaration')->nullable();

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
        Schema::dropIfExists('properties');
    }
}
