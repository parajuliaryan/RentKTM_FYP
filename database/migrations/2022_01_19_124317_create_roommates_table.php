<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoommatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roommates', function (Blueprint $table) {
            $table->id();
            $table->string('roommate_name');
            $table->integer('roommate_age')->length(2)->unsigned();
            $table->integer('roommate_rent_price')->unsigned();
            $table->text('roommate_description');
            $table->text('roommate_features');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->string('contact_number',10);
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
        Schema::dropIfExists('roommates');
    }
}
