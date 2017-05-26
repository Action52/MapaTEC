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
          'email' => 'A01322275@itesm.mx',
          'password' => bcrypt('schwarz')
        ]);
    }
}
