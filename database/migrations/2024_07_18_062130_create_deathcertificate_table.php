<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathcertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deathcertificate', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_death')->nullable();
            $table->string('deceased_name')->nullable();
            $table->string('deceased__uid_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_uid_number')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_uid_number')->nullable();
            $table->string('spouse_names')->nullable();
            $table->string('spouse_uid_number')->nullable();
            $table->string('death_person_age')->nullable();
            $table->string('time_of_death_address')->nullable();
            $table->string('address_of_death_person')->nullable();
            $table->string('hospital_institution')->nullable();
            $table->string('home_path')->nullable();
            $table->string('another_location')->nullable();
            $table->string('name_of_informant')->nullable();
            $table->string('path')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->nullable();
            $table->string('city_or_village_name')->nullable();
            $table->string('city_or_village')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('received_treatment_before_death')->nullable();
            $table->string('medical_certified')->nullable();
            $table->string('disease_name')->nullable();
            $table->string('female_death')->nullable();
            $table->string('smoking_addicted')->nullable();
            $table->string('chewing_tobacco')->nullable();
            $table->string('chewing_betel_nut')->nullable();
            $table->string('alchol_addicted')->nullable();
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
        Schema::dropIfExists('deathcertificate');
    }
}
