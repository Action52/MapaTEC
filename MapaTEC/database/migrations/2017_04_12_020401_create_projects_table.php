<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('status');
            $table->string('pdf');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
      //Relational tables

        //project_has_strategicpartner
        Schema::create('project_has_strategicpartner', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('sp_id');
            $table->foreign('sp_id')->references('id')->on('strategicpartners')->onDelete('cascade');
            $table->timestamps();
        });

        //project_has_user
        Schema::create('project_has_user', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('owner');
            $table->string('role');
            $table->timestamps();
        });

        //project_has_campus
        Schema::create('project_has_campus', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->timestamps();
        });

        //project_has_category
        Schema::create('project_has_category', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        //project_has_time
        Schema::create('project_has_time', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('time_id');
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
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
        Schema::dropIfExists('project_has_strategicpartner');
        Schema::dropIfExists('project_has_user');
        Schema::dropIfExists('project_has_campus');
        Schema::dropIfExists('project_has_category');
        Schema::dropIfExists('project_has_time');
        Schema::dropIfExists('projects');
    }
}
