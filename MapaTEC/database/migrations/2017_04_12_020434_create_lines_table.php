<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //Insert geometry

        DB::statement('ALTER TABLE lines ADD COLUMN geom GEOMETRY(LINESTRING,4326)');


        //location_has_line
        Schema::create('location_has_line', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('line_id');
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
        Schema::dropIfExists('location_has_line');
        Schema::dropIfExists('lines');
    }
}
