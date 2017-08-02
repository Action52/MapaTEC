<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
        'name' => 'MapaTEC',
        'description' => 'NOVUS 2016 Proyecto con el objetivo de desarrollar una página web con mapa.',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      //Nuevos seeds
      DB::table('projects')->insert([
        'name' => 'INC Monterrey',
        'description' => 'Congreso de emprendimiento.',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      DB::table('projects')->insert([
        'name' => 'Rescate de tortugas',
        'description' => 'Servicio social que consiste en rescatar tortugas marinas en la playa.',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      DB::table('projects')->insert([
        'name' => 'Mexcritores',
        'description' => 'Proyecto de emprendimiento para desarrollar una página web que ayude a escritores mexicanos emergentes a publicar sus escritos.',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      DB::table('projects')->insert([
        'name' => 'Semana i Supercomputo',
        'description' => 'Semana i 2017. Diplomado de supercómputo en CINVESTAV.',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      DB::table('projects')->insert([
        'name' => 'AsesoriasTEC',
        'description' => 'NOVUS 2016 Proyecto con el objetivo de desarrollar una interfaz de asesorias',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);
      DB::table('projects')->insert([
        'name' => 'Taller GameMaker',
        'description' => 'Taller de programación de videojuegos impartido cada semestre',
        'status' => 1,
        'pdf' => 'dropbox.com',
        'has_pic' => 0,
        'latitud' =>19.432608,
        'longitud' => -99.133209
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_strategicpartner')->insert([
        'project_id' => 1,
        'sp_id' => 1
      ]);

      DB::table('project_has_user')->insert([
        'project_id' => 1,
        'user_id' => 1,
        'owner' => 'True',
        'role' => 'Líder'
      ]);

      DB::table('project_has_user')->insert([
        'project_id' => 1,
        'user_id' => 2,
        'owner' => 'False',
        'role' => 'Administrador'
      ]);

      DB::table('project_has_user')->insert([
        'project_id' => 2,
        'user_id' => 2,
        'owner' => 'True',
        'role' => 'Líder'
      ]);

      DB::table('project_has_user')->insert([
        'project_id' => 3,
        'user_id' => 2,
        'owner' => 'True',
        'role' => 'Líder'
      ]);

      DB::table('project_has_strategicpartner')->insert([
        'project_id' => 2,
        'sp_id' => 1,
      ]);

      DB::table('project_has_campus')->insert([
        'project_id' => 1,
        'campus_id' => 1,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 1,
        'category_id' => 1,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 3,
        'category_id' => 4,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 2,
        'category_id' => 1,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 4,
        'category_id' => 2,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 5,
        'category_id' => 3,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 6,
        'category_id' => 4,
      ]);

      DB::table('project_has_category')->insert([
        'project_id' => 7,
        'category_id' => 2,
      ]);

      DB::table('project_has_time')->insert([
        'project_id' => 1,
        'time_id' => 1,
      ]);
    }
}
