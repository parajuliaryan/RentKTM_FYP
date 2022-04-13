<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_owner');
            $table->unsignedBigInteger('enquirer');
            $table->unsignedBigInteger('for_room');
            $table->foreign('ad_owner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('enquirer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('for_room')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('chat_rooms');
    }
}
