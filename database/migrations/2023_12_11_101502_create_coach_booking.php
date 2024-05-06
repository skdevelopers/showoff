<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_booking', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('booking_date');
            $table->string('timslot');
            $table->DateTime('booking_datetime');
            $table->integer('payment_method');
            $table->double('amount_paid');
            $table->integer('payment_status');
            $table->text('payment_ref');
            $table->integer('coach_id');
            $table->integer('status');
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
        Schema::dropIfExists('coach_booking');
    }
}
