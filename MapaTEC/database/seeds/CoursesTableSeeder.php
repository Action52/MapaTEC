<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
        'name' => 'Calidad y Pruebas de Software',
        'code' => 'TC3045'
      ]);
      DB::table('courses')->insert([
        'name' => 'Biología I',
        'code' => 'BT1009'
      ]);
      DB::table('courses')->insert([
        'name' => 'Fundamentos de la programación',
        'code' => 'TC1014'
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_course')->insert([
        'project_id' => 1,
        'course_id' => 1,
      ]);
    }
}
