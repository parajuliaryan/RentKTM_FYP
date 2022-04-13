<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title');
            $table->text('room_description');
            $table->string('room_type');
            $table->integer('room_price');
            $table->integer('student_price')->nullable();
            $table->string('contact_number',10);
            $table->string('city');
            $table->string('ward');
            $table->string('area');
            $table->string('tole');
            $table->integer('counter_field')->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
