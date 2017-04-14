<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('majors')->insert([
        'name' => 'Ingeniería en Tecnologías Computacionales',
        'aka' => 'ITC',
        'program' => 'ITC11'
      ]);
      DB::table('majors')->insert([
        'name' => 'Ingeniería en Tecnologías Computacionales',
        'aka' => 'ITC',
        'program' => 'ITC09'
      ]);
      DB::table('majors')->insert([
        'name' => 'Ingeniería en Mecatrónica',
        'aka' => 'IMT',
        'program' => 'IMT11'
      ]);
      DB::table('majors')->insert([
        'name' => 'Arquitectura',
        'aka' => 'ARQ',
        'program' => 'ARQ11'
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_major')->insert([
        'project_id' => 1,
        'major_id' => 1,
      ]);
    }
}
