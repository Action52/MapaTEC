<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('aka');
            $table->string('program');
            $table->timestamps();
        });

        //project_has_major
        Schema::create('project_has_major', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('major_id');
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
        Schema::dropIfExists('project_has_major');
        Schema::dropIfExists('majors');
    }
}
