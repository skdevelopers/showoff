<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reports', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->foreign("user_id")->references("id")->on('users')->onDelete('Cascade');
            $table->integer("reported_user_id");
            $table->foreign("reported_user_id")->references("id")->on('users')->onDelete('Cascade');
            $table->text("reason");
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
        Schema::dropIfExists('user_reports');
    }
}
