<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonLot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_lot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person');
            $table->foreign('person')->references('id')->on('persons');
            $table->unsignedBigInteger('lot');
            $table->foreign('lot')->references('id')->on('lots');
            $table->string('type');
            $table->string('status')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_lot');
    }
}
