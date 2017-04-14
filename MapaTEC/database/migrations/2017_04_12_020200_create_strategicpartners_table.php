<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategicpartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategicpartners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->boolean('private_or_public');
            $table->boolean('moral_or_physical');
            $table->timestamps();
        });

        //Insert geometry

        DB::statement('ALTER TABLE strategicpartners ADD COLUMN geom GEOMETRY');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strategicpartners');
    }
}
