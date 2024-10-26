<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriages', function (Blueprint $table) {
           $table->id();
           $table->string('city')->nullable();
           $table->string('village')->nullable();
           $table->string('ward')->nullable();
           $table->string('marriage_place')->nullable();
           $table->date('marriage_date')->nullable();
           $table->string('pin_code')->nullable();
           $table->string('bride_name')->nullable();
           $table->date( 'bride_date_of_birth')->nullable();
           $table->string('bride_contact')->nullable();
           $table->string('bride_email')->nullable();
           $table->string('bride_father_name')->nullable();
           $table->string('bride_mother_name')->nullable();
           $table->string('bride_address')->nullable();
           $table->string('bride_district')->nullable();
           $table->string('bride_state')->nullable();
           $table->string('bride_country')->nullable();
           $table->string('bride_pincode')->nullable();
           $table->string('bride_is_divyang')->nullable();
           $table->string('groom_name')->nullable();
           $table->date('groom_date_of_birth')->nullable();
           $table->string('groom_contact')->nullable();
           $table->string('groom_email')->nullable();
           $table->string('groom_father_name')->nullable();
           $table->string('groom_mother_name')->nullable();
           $table->string('groom_address')->nullable();
           $table->string('groom_district')->nullable();
           $table->string('groom_state')->nullable();
           $table->string('groom_country')->nullable();
           $table->string('groom_pincode')->nullable();
           $table->string('groom_is_divyang')->nullable();
           $table->string('bride_guardian_relation_with_bride')->nullable();
           $table->string('bride_guardian_name')->nullable();
           $table->string('bride_guardian_address')->nullable();
           $table->string('bride_guardian_district')->nullable();
           $table->string('bride_guardian_state')->nullable();
           $table->string('bride_guardian_country')->nullable();
           $table->string('bride_guardian_pincode')->nullable();
           $table->string('bride_guardian_contact')->nullable();
           $table->string('bride_guardian_email')->nullable();
           $table->string('groom_guardian_relation_with_bride')->nullable();
           $table->string('groom_guardian_name')->nullable();
           $table->string('groom_guardian_address')->nullable();
           $table->string('groom_guardian_district')->nullable();
           $table->string('groom_guardian_state')->nullable();
           $table->string('groom_guardian_country')->nullable();
           $table->string('groom_guardian_pincode')->nullable();
           $table->string('groom_guardian_contact')->nullable();
           $table->string('groom_guardian_email')->nullable();
           $table->string('bride_witness_name')->nullable();
           $table->string('bride_witness_address')->nullable();
           $table->string('bride_witness_district')->nullable();
           $table->string('bride_witness_state')->nullable();
           $table->string('bride_witness_country')->nullable();
           $table->string('bride_witness_pincode')->nullable();
           $table->string('bride_witness_contact')->nullable();
           $table->string('groom_witness_name')->nullable();
           $table->string('groom_witness_address')->nullable();
           $table->string('groom_witness_district')->nullable();
           $table->string('groom_witness_state')->nullable();
           $table->string('groom_witness_country')->nullable();
           $table->string('groom_witness_pincode')->nullable();
           $table->string('groom_witness_contact')->nullable();
           $table->string('age_proof_bride')->nullable();
           $table->string('age_proof_father')->nullable();
           $table->string('age_proof_mother')->nullable();
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
        Schema::dropIfExists('marriages');
    }
}
