<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProviderRegisterAddMoreDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('provider_registration', function (Blueprint $table) {
            /*$table->text('about_me')->nullable();
            $table->integer('main_category_id')->default(0);
            $table->string('business_type')->nullable();
            $table->string('trade_license')->nullable();*/
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
