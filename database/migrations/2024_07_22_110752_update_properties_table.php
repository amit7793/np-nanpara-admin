<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            // Drop columns
            $table->dropColumn([
                'city',
                'house_number',
                'colony_name',
                'street_name',
                'village',
                'pin_code',
                'existing_property_id',
                'property_usage_type',
                'property_type',
                'rainwater_harvesting_property',
                'unit_usage_type',
                'sub_usage_type',
                'occupancy',
                'supper_built_up_area',
                'floor',
                'plot_size',
                'no_of_floors',
                'v_plot_size',
                'ownership_type',
                'name',
                'gender',
                'mobile',
                'guardian_name',
                'relationship',
                'category',
                'email',
                'address',
                'address_proof',
                'identify_proof',
                'registration_proof',
                'usage_proof',
                'occupancy_proof',
                'construction_proof',
                'address_proof_img',
                'identify_proof_img',
                'registration_proof_img',
                'usage_proof_img',
                'occupancy_proof_img',
                'construction_proof_img',
                'declaration',
            ]);
            $table->unsignedBigInteger('user_id')->after('id'); // Adjust the column position as needed
            $table->string('property')->nullable();
            $table->string('details_of_owner')->nullable();
            $table->string('land_building_description')->nullable();
            $table->string('land_building_description_b')->nullable();
            $table->string('land_building_description_c')->nullable();
            $table->string('land_building_situated')->nullable();
            $table->string('land_located')->nullable();
            $table->string('building_owner_rent')->nullable();
            $table->string('nature_building_construction')->nullable();
            $table->string('construction_year')->nullable();
            $table->string('predetermind_value_year')->nullable();
            $table->string('annual_value_building')->nullable();
            $table->string('annual_value_land')->nullable();
            $table->string('total_annual_value')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            // Add the dropped columns back
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

            // Drop the new columns added
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'user_id',
                'property',
                'details_of_owner',
                'land_building_description',
                'land_building_description_b',
                'land_building_description_c',
                'land_building_situated',
                'land_located',
                'building_owner_rent',
                'nature_building_construction',
                'construction_year',
                'predetermind_value_year',
                'annual_value_building',
                'annual_value_land',
                'total_annual_value',
                // Add other new columns to be dropped
            ]);
        });
    }
}
