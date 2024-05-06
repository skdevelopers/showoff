<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('event_id')->default(0);
            $table->integer('game_id')->default(0);
            $table->integer('num_of_seats')->default(0);
            $table->integer('payment_mode')->default(0);
            $table->double('item_amount')->default(0);
            $table->double('grand_total')->default(0);
            $table->dateTime('booking_date')->nullable();
            $table->string('seat_position')->nullable();
            $table->integer('timeslot_id')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::create('temp_booking', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('event_id')->default(0);
            $table->integer('game_id')->default(0);
            $table->text('payment_ref');
            $table->integer('num_of_seats')->default(0);
            $table->integer('payment_mode')->default(0);
            $table->double('item_amount')->default(0);
            $table->double('grand_total')->default(0);
            $table->dateTime('booking_date')->nullable();
            $table->string('seat_position')->nullable();
            $table->integer('timeslot_id')->default(0);
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
        Schema::dropIfExists('booking');
    }
}
