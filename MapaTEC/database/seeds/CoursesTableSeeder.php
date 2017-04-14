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
        'department' => 'Tecnologías de la Información',
        'name' => 'Calidad y Pruebas de Software'
      ]);
      DB::table('courses')->insert([
        'department' => 'Biotecnología',
        'name' => 'Biología I'
      ]);
      DB::table('courses')->insert([
        'department' => 'Tecnologías de la Información',
        'name' => 'Fundamentos de la programación'
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_course')->insert([
        'project_id' => 1,
        'course_id' => 1,
      ]);
    }
}
