<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GamesRules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->default(0);
            $table->longText('rule_title')->nullable();
            $table->longText('rule_description')->nullable();
            $table->longText('rule_details')->nullable();
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
        Schema::dropIfExists('games_rules');
    }
}
