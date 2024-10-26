<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicenseOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_license_owners', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('address')->nullable();
            $table->string('category')->nullable();
            $table->string('license_type')->nullable();
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
        Schema::dropIfExists('trade_license_owners');
    }
}
