<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthcertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birthcertificate', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('name')->nullable();
            $table->string('name_of_father')->nullable();
            $table->string('name_of_mother')->nullable();
            $table->string('address_parent_child')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('name_of_informant')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email_id')->nullable();
            $table->string('mother_resides_place')->nullable();
            $table->string('family_tradition')->nullable();
            $table->string('father_educational_level')->nullable();
            $table->string('mother_educational_level')->nullable();
            $table->string('father_business')->nullable();
            $table->string('mother_age_at_marriage')->nullable();
            $table->string('time_of_child_birth')->nullable();
            $table->string('uninhabited_people_this_year_of_mother')->nullable();
            $table->string('Under_auspices_delivery_take_place')->nullable();
            $table->string('time_of_conception')->nullable();
            $table->string('weight_at_birth')->nullable();
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
        Schema::dropIfExists('birthcertificate');
    }
}
