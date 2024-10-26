<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complain_id'); // Use unsignedBigInteger for foreign key
            $table->unsignedBigInteger('user_id');
            $table->string('send');
            $table->longText('message');
            $table->string('received');
            $table->timestamps();
            $table->foreign('complain_id')->references('id')->on('complains')->onDelete('cascade');
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
        Schema::dropIfExists('complains_messages');
    }
}
