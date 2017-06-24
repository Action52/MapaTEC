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
          'email' => 'A01322274@itesm.mx',
          'password' => bcrypt('schwarz')
        ]);

        DB::table('users')->insert([
          'name' => 'Ricardo',
          'email' => 'A01325081@itesm.mx',
          'password' => bcrypt('celtics')
        ]);
    }
}
