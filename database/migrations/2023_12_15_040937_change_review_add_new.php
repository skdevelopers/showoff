<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReviewAddNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //review
        Schema::table('review', function (Blueprint $table) {
            
            $table->integer('outlet_id')->default(0);
            $table->dropColumn('game_id');
            $table->dropColumn('event_id');
            $table->dropColumn('booking_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
