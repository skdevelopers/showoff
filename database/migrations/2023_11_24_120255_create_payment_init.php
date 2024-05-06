<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_init', function (Blueprint $table) {
            $table->id();
            $table->double('total_amount')->default(0);
            $table->string('transaction_id')->nullable();
            $table->integer('invoice_id')->default(0);
            $table->text('transaction_details')->nullable();
            $table->integer('payment_status')->default(0);
            $table->integer('user_id')->default(0);          
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
        Schema::dropIfExists('payment_init');
    }
}
