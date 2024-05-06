<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
          $table->id();
          $table->string('name',600)->nullable();
          $table->double('amount', 15, 2)->default(0);
          $table->integer('status')->default(0);
          $table->longText('knowmore')->nullable();
          $table->longText('rewards')->nullable();
          $table->integer('country_id')->default(0);
          $table->integer('state_id')->default(0);
          $table->integer('city_id')->default(0);
          $table->string('location',600)->nullable();
          $table->string('latitude',600)->nullable();
          $table->string('longitude',600)->nullable();
          $table->integer('deleted')->default(0);
          $table->DateTime('event_datetime')->nullable();
          $table->integer('total_participants')->default(0);
          $table->integer('applied_participants')->default(0);
          $table->timestamps();
        });
        Schema::create('event_amenity', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->default(0);
            $table->integer('amenitiy_id')->default(0);
            $table->timestamps();
        });
        Schema::create('event_images', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->default(0);
            $table->string('event_image',600)->nullable();
            $table->timestamps();
        });
        Schema::table('review', function (Blueprint $table) {
            $table->integer('event_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
