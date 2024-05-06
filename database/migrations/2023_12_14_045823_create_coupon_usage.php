<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponUsage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_usage', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('coupon_id');
            $table->string('coupon_code');
            $table->double('earned_amount');
            $table->integer('status');
            $table->dateTime('earned_date');
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
        Schema::dropIfExists('coupon_usage');
    }
}
