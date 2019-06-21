<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_id')->unsigned();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->integer('customer_id')->unsigned();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('customer_id')->references('id')->on('customers');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
