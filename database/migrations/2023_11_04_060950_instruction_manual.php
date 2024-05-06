<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstructionManual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruction_manual', function (Blueprint $table) {
            $table->id();
            $table->string('name',600)->nullable();
            $table->string('file',600)->nullable();
            $table->longText('description')->nullable();
            $table->double('amount', 15, 2)->default(0);
            $table->integer('active')->default(0);
            $table->integer('deleted')->default(0);
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('instruction_manual');
    }
}
