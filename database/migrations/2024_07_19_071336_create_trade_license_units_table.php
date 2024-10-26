<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicenseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_license_units', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_id')->nullable();
            $table->string('trade_type')->nullable();
            $table->string('trade_subType')->nullable();
            $table->string('uom')->nullable();
            $table->string('uom_value')->nullable();
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
        Schema::dropIfExists('trade_license_units');
    }
}
