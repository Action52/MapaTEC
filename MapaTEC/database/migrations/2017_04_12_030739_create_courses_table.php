<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->string('name');
            $table->timestamps();
        });

        //project_has_course
        Schema::create('project_has_course', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('course_id');
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
        Schema::dropIfExists('project_has_course');
        Schema::dropIfExists('courses');
    }
}
