<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTradeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_licenses', function (Blueprint $table) {
            $table->tinyInteger('check_status')->default(0);
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_licenses', function (Blueprint $table) {
            $table->dropColumn('check_status');
            $table->dropColumn('remark');
        });
    }
}
