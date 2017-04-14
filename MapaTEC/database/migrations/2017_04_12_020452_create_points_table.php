<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //Insert geometry

        DB::statement('ALTER TABLE points ADD COLUMN geom GEOMETRY(POINT,4326)');

        //location_has_point
        Schema::create('location_has_point', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('point_id');
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
        Schema::dropIfExists('location_has_point');
        Schema::dropIfExists('points');
    }
}
