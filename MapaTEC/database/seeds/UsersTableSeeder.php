<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
          'name' => 'Luis Alfredo',
          'lastname' => 'León Villapún',
          'description' => 'Estudiante de ITC de séptimo semestre. Amante de la astronomía, la ciencia y la computación.',
          'interests' => 'Programación Astronomía Ciencia',
          'email' => 'A01322274@itesm.mx',
          'password' => bcrypt('schwarz')
        ]);

        DB::table('users')->insert([
          'name' => 'Ricardo',
          'lastname' => 'Rodiles Legaspi',
          'description' => 'Estudiante de ITC de séptimo semestre. Disfruto de la programación competitiva.',
          'interests' => 'ACM Competitive Programming Finance',
          'email' => 'A01325081@itesm.mx',
          'password' => bcrypt('celtics')
        ]);

    }
}
