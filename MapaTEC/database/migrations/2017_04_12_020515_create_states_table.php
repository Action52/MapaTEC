<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        //location_has_state
        Schema::create('location_has_state', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::dropIfExists('location_has_state');
        Schema::dropIfExists('states');
    }
}
