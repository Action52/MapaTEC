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
          'email' => 'A01322274@itesm.mx',
          'password' => bcrypt('schwarz')
        ]);

        DB::table('users')->insert([
          'name' => 'Ricardo',
          'lastname' => 'Rodiles Legaspi',
          'email' => 'A01325081@itesm.mx',
          'password' => bcrypt('celtics')
        ]);
    }
}
