<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('booking_confirmed_push')->default(0);
            $table->integer('booking_reminder_push')->default(0);
            $table->integer('promotional_alert_push')->default(0);
            $table->integer('winner_alert_push')->default(0);
            $table->integer('booking_confirmed_email')->default(0);
            $table->integer('booking_reminder_email')->default(0);
            $table->integer('promotional_alert_email')->default(0);
            $table->integer('winner_alert_email')->default(0);
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
        Schema::dropIfExists('user_settings');
    }
}
