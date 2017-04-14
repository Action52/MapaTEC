<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('states')->insert([
        'name' => 'Puebla'
      ]);
      DB::table('states')->insert([
        'name' => 'Jalisco'
      ]);
      DB::table('states')->insert([
        'name' => 'Nuevo León'
      ]);
      DB::table('states')->insert([
        'name' => 'Guanajuato'
      ]);
      DB::table('states')->insert([
        'name' => 'Texas'
      ]);

      //Seeds para tablas cruce
      DB::table('location_has_state')->insert([
        'location_id' => 1,
        'state_id' => 1,
      ]);
    }
}
