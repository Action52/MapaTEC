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
        'pdf' => 'dropbox.com'
      ]);
      DB::table('projects')->insert([
        'name' => 'Asesorias',
        'description' => 'NOVUS 2016 Proyecto con el objetivo de desarrollar una interfaz de asesorias',
        'status' => 1,
        'pdf' => 'dropbox.com'
      ]);
      DB::table('projects')->insert([
        'name' => 'Taller GameMaker',
        'description' => 'Taller de programación de videojuegos impartido cada semestre',
        'status' => 1,
        'pdf' => 'dropbox.com'
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_strategicpartner')->insert([
        'project_id' => 1,
        'sp_id' => 1,
      ]);

      DB::table('project_has_user')->insert([
        'project_id' => 1,
        'user_id' => 1,
        'owner' => 'True',
        'role' => 'Líder'
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

      DB::table('project_has_time')->insert([
        'project_id' => 1,
        'time_id' => 1,
      ]);
    }
}
