<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('commencement_date')->nullable();
            $table->string('trade_period')->nullable();
            $table->string('trade_gst_no')->nullable();
            $table->string('trade_purpose')->nullable();
            $table->string('city')->nullable();
            $table->string('door')->nullable();
            $table->string('colony_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('village')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('collection_name')->nullable();
            $table->string('type_of_ownership')->nullable();
            $table->string('type_of_sub_ownership')->nullable();
            $table->string('ownership_id_proof_img')->nullable();
            $table->string('ownership_id_proof')->nullable();
            $table->string('ownership_proof_img')->nullable();
            $table->string('ownership_proof')->nullable();
            $table->string('ownership')->nullable();
            $table->string('ownership_photu')->nullable();
            $table->enum('status', ['Active', 'Deactive'])->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('trade_licenses');
    }
}
