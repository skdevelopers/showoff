<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualDownloads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_downloads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('manual_id');
            $table->double('amount')->default(0);
            $table->double('grand_total')->default(0);
            $table->integer('payment_mode')->default(0);
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
        Schema::dropIfExists('manual_downloads');
    }
}
