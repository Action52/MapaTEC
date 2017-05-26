<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //Insert geometry

        DB::statement('ALTER TABLE areas ADD COLUMN geom GEOMETRY(POLYGON,4326)');
        Schema::enableForeignKeyConstraints();
        //location_has_area
        Schema::create('location_has_area', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->integer('area_id');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
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
        Schema::dropIfExists('location_has_area');
        Schema::dropIfExists('areas');
    }
}
